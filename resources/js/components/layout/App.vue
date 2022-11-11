<template>
    <!-- Page Wrapper -->
    <div id="wrapper">
            <navigation :menuOpen="menuOpen"></navigation>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" @click="toggleMenu" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>               

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" @click="toggleNotifications" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span v-if="user.new_notifications.length > 0" class="badge badge-danger badge-counter">{{user.new_notifications.length}}</span>
                        </a>
                        <Notifications  v-if="notificationsVisible" :notifications="user.new_notifications"></Notifications>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" @click="toggleDropdown" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"  id="userDropdownText" >{{user.name}}</span>
                            <img   id="userDropdownImg"  class="img-profile rounded-circle"
                                src="img/user.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div v-if="dropdownOpen"  v-click-outside="dropdownOutsideClick" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown" style="display:block">
                            <router-link to="/profile"   @click.native="dropdownOutsideClick" class="dropdown-item">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </router-link>
                           <a class="dropdown-item" @click="logout" href="#" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
                
            <!-- End of Topbar -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                </div>
                    <router-view></router-view>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
</template>

<script>
import Notifications from './Noitifications.vue';
    export default {
        Name: "App",
        data() {
            return {
                menuOpen: true,
                dropdownOpen: false,
                notificationsVisible: false,
                windowWidth: window.innerWidth,
                user: {new_notifications: []}
            }
        },
        components:{
            Notifications
        },
        mounted() {
            this.$nextTick(() => {
                window.addEventListener('resize', this.onResize);
            })

            this.onResize();
            this.getUser();
            this.refreshUser();
        },
        beforeDestroy() { 
            window.removeEventListener('resize', this.onResize); 
        },
        methods: {
            toggleMenu(){
                this.menuOpen = !this.menuOpen;
            },
            toggleDropdown(){
                this.dropdownOpen = !this.dropdownOpen;
            },
            dropdownOutsideClick(e){
                if (e.target.id && e.target.id.indexOf('userDropdown') > -1)
                    return false;
                
                 this.dropdownOpen = false;
            },
            logout(){
                axios
                .post(process.env.MIX_API_URL + '/logout')
                .then(response => {
                    location.reload();
                })
            },
            onResize() {
                this.windowWidth = window.innerWidth
                if(this.windowWidth < 786 && this.menuOpen)
                    this.menuOpen = false;
                else if(this.windowWidth >= 786)
                    this.menuOpen = true;
            },
            refreshUser(){  
                this.intervalid1 = setInterval(() => {this.getUser()}, 5000);
            },
            getUser(){
                axios
                .get(`${process.env.MIX_API_URL}/api/my-profile`)
                .then(response => {
                    this.user = response.data.profile;
                }) 
            },
            toggleNotifications(){
                this.notificationsVisible = !this.notificationsVisible;
            }
        }
    }

</script>

<style>
/* custom scrollbar */
::-webkit-scrollbar {
  width: 20px;
}

::-webkit-scrollbar-track {
  background-color: transparent;
}

::-webkit-scrollbar-thumb {
  background-color: #d6dee1;
  border-radius: 20px;
  border: 6px solid transparent;
  background-clip: content-box;
}

::-webkit-scrollbar-thumb:hover {
  background-color: #a8bbbf;
}

.card-body{
    overflow-y: scroll;
}
</style>
