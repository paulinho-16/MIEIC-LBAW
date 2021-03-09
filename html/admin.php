<?php
include_once(__DIR__ .  "/templates/header-admin.php");
breadcrum();
?>
<style scoped>
    button.active {
        border-left: 6px solid black !important;
        background-color: white !important;
        border-radius: 0 !important;
        font-weight: bold;
    }

    @media (max-width: 576px) {
        .flex-vertical {
            flex-direction: column !important;
        }

        .flex-horizontal {
            flex-direction: row !important;
            margin: auto !important;
            justify-content: center;
            border: 0 !important;
            padding: 0 !important;
            margin-bottom: 2rem !important;
        }

        button.mb-3 {
            margin-bottom: 0 !important;
        }

        button.active {
            border-left: 0 !important;
            border-bottom: 6px solid black !important;
            background-color: white !important;
            border-radius: 0 !important;
            font-weight: bold;
        }
    }
</style>
<h1 class="text-center">Admin Panel</h1>
<div class="d-flex align-items-start flex-vertical mt-sm-5">
    <div class="nav flex-column nav-pills me-3 border-right p-3 flex-horizontal" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link text-primary rounded-0 mb-3 active" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="true">Users<span class="d-none d-sm-block"> Management</span></button>
        <button class="nav-link text-primary rounded-0 mb-3" id="v-pills-auctions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-auctions" type="button" role="tab" aria-controls="v-pills-auctions" aria-selected="false">Auctions<span class="d-none d-sm-block"> Management</span></button>
        <button class="nav-link text-primary rounded-0 mb-3" id="v-pills-reports-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reports" type="button" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</button>
        <button class="nav-link text-primary rounded-0 mb-3" id="v-pills-help-tab" data-bs-toggle="pill" data-bs-target="#v-pills-help" type="button" role="tab" aria-controls="v-pills-help" aria-selected="false">Help</button>
    </div>
    <div class="tab-content w-100" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
            <?php
            include_once(__DIR__ . "/admin/user-management.php");
            ?>
        </div>
        <div class="tab-pane fade" id="v-pills-auctions" role="tabpanel" aria-labelledby="v-pills-auctions-tab">
            <?php
            include_once(__DIR__ . "/admin/auction-management.php");
            ?>
        </div>
        <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
            <?php
            include_once(__DIR__ . "/admin/reports.php");
            ?>
        </div>
        <div class="tab-pane fade" id="v-pills-help" role="tabpanel" aria-labelledby="v-pills-help-tab">
            <?php
            include_once(__DIR__ . "/admin/help.php");
            ?>
        </div>
    </div>
</div>
<?php
include_once(__DIR__ . "/templates/footer-logged-in.php");
?>