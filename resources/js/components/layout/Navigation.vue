<template>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <router-link to="/" class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">PROJENY</div>
        </router-link>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            My Stuff
        </div>

        <!-- Nav Item - Pages Collapse Menu-->
        <li class="nav-item">
            <router-link to="/groups" class="nav-link">
                <i class="fas fa-fw fa-users"></i>
                <span>My Groups</span>
            </router-link>
        </li>
    </ul>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
