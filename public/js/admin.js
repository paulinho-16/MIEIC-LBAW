user_list = document.querySelector("#user-management-list")
user_links = document.querySelector("#user-management-pagination")
user_search_input = document.querySelector("#user-management-search-input")
auction_list = document.querySelector("#auction-management-list")
auction_links = document.querySelector("#auction-management-pagination")
auction_search_input = document.querySelector("#auction-management-search-input")
make_admin_text = document.querySelector("#make-admin-text")
make_admin_form = document.querySelector("#make-admin-form")
ban_text = document.querySelector("#ban-text")
ban_form = document.querySelector("#ban-form")
suspend_text = document.querySelector("#suspend-text")
suspend_form = document.querySelector("#suspend-form")

sendAjaxRequest('GET','/api/users', {}, setUsers, [{name: 'Accept', value: 'text/html'}])
sendAjaxRequest('GET','/api/auctions', {}, setAuctions, [{name: 'Accept', value: 'text/html'}])

user_search_input.addEventListener('input', () => {
    if(user_search_input.value.length > 1)
        sendAjaxRequest('GET','/api/users', {'page' : 1, 'search': user_search_input.value}, setUsers, [{name: 'Accept', value: 'text/html'}])
    else if(user_search_input.value.length == 0){
        sendAjaxRequest('GET','/api/users', {}, setUsers, [{name: 'Accept', value: 'text/html'}])
    }
})

auction_search_input.addEventListener('input', () => {
    if(auction_search_input.value.length > 1)
        sendAjaxRequest('GET','/api/auctions', {'page' : 1, 'search': auction_search_input.value}, setAuctions, [{name: 'Accept', value: 'text/html'}])
    else if(auction_search_input.value.length == 0){
        sendAjaxRequest('GET','/api/auctions', {}, setAuctions, [{name: 'Accept', value: 'text/html'}])
    }
})

function setUsers(){
    let users = JSON.parse(this.response)
    
    if(users.result == "success"){
        user_list.innerHTML = users.content.users
        user_links.innerHTML = users.content.links
        enable_pagination(user_links, "/api/users", user_search_input, setUsers)

        make_admin_buttons = document.querySelectorAll(".make-admin-button")
        ban_buttons = document.querySelectorAll(".ban-button")

        for (const button of make_admin_buttons) {
            button.addEventListener('click', update_ma_modal)
        }

        for (const button of ban_buttons) {
            button.addEventListener('click', update_ban_modal)
        }
    }
}

function setAuctions(){
    let auctions = JSON.parse(this.response)
    
    if(auctions.result == "success"){
        auction_list.innerHTML = auctions.content.auctions
        auction_links.innerHTML = auctions.content.links
        enable_pagination(auction_links, "/api/auctions", auction_search_input, setAuctions)

        suspend_buttons = document.querySelectorAll(".suspend-button")

        for (const button of suspend_buttons) {
            button.addEventListener('click', update_suspend_modal)
        }
    }
}

function replace_child(original, replacement_tag){
    var replacement = document.createElement(replacement_tag);

    for(var i = 0, l = original.attributes.length; i < l; ++i){
        var nodeName  = original.attributes.item(i).nodeName;
        var nodeValue = original.attributes.item(i).nodeValue;

        replacement.setAttribute(nodeName, nodeValue);
    }
    replacement.innerHTML = original.innerHTML;

    original.parentNode.replaceChild(replacement, original);

    return replacement
}

function enable_pagination(parent, api, search, callback) {
    plinks = parent.querySelectorAll(`.pagination > .page-item > a.page-link`)

    for (let plink of plinks) {
        plink.removeAttribute("href")
        new_child = replace_child(plink, "span")
        new_child.style.cursor = "pointer"

        new_child.addEventListener("click", function(){
            
            page_number = this.innerHTML
            current_page = parent.getAttribute("data-page")

            if(this.getAttribute("rel") == "next")
                page_number = parseInt(current_page) + 1
            else if(this.getAttribute("rel") == "prev")
                page_number = parseInt(current_page) - 1

            parent.setAttribute("data-page", page_number)
            sendAjaxRequest('GET',api, {'page': page_number, 'search' : search.value }, callback, [{name: 'Accept', value: 'text/html'}])
        })
    }
}

function update_ma_modal(){
    username = this.getAttribute("data-username")
    make_admin_text.innerHTML = `You are going to promote ${username} to admin.`
    make_admin_form.setAttribute('action', `/admin/make/${username}`)
}

function update_ban_modal(){
    username = this.getAttribute("data-username")

    banned = this.innerHTML == "Unban"

    ban_text.innerHTML = `You are going to ban ${username}.`
    ban_form.setAttribute('action', `/admin/ban/${username}`)

    button = ban_form.querySelector("button[type=submit]")
    button.innerHTML = banned ? "Unban" : "Ban"
    
    if(banned){
        button.classList.replace("btn-danger", "btn-success")
    }
    else{
        button.classList.replace("btn-success", "btn-danger")
    }
}

function update_suspend_modal(){
    id = this.getAttribute("data-id")

    suspended = this.innerHTML == "Unsuspend"

    title = this.getAttribute("data-auction")
    suspend_text.innerHTML = `You are going to suspend auction ${id} (${title}).`
    suspend_form.setAttribute('action', `/admin/suspend/${id}`)

    button = suspend_form.querySelector("button[type=submit]")
    button.innerHTML = suspended ? "Unsuspend" : "Suspend"
    
    if(suspended){
        button.classList.replace("btn-danger", "btn-success")
    }
    else{
        button.classList.replace("btn-success", "btn-danger")
    }
}