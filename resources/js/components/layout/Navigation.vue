<template>
    <ul v-if="menuOpen" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
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

        <li class="nav-item">
            <router-link to="/groups" class="nav-link">
                <i class="fas fa-fw fa-users"></i>
                <span>My Groups</span>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/projects" class="nav-link">
                <i class="fas fa-fw fa-edit"></i>
                <span>My Projects</span>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/tasks" class="nav-link">
                <i class="fas fa-fw fa-check-circle"></i>
                <span>My Tasks</span>
            </router-link>
        </li>
        
        <!-- Admin -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Admin
        </div>

        <li class="nav-item">
            <router-link to="/users" class="nav-link">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span>
            </router-link>
        </li>
    </ul>
</template>
<script>
    export default {
        props:{
            menuOpen: false
        }
    }
</script>
