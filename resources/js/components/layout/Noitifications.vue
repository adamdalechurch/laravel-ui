<template>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="display:block"
                            aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notifications
        </h6>
        <a v-for="notification in notifications" :key="notification.id" class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{notification.subject}}</div>
                <span class="font-weight-bold">{{notification.body}}</span>
            </div>
        </a>
    </div>
</template>

<script>
export default{
    Name: "App",
    props:{
        notifications: []
    }
}
</script>