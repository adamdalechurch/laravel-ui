<template>
  <div>
    <div class="row">
      <TopBox colorClass='primary' title='Open Projects' iconClass='fa-edit' :body="dashboard.open_projects_count"></TopBox>
      <TopBox colorClass='success' title='Open Tasks' iconClass="`fa-check-circle`" :body="dashboard.open_tasks_count"></TopBox>
      <TopBox colorClass='info' title='Progress' iconClass="`fa-clipboard-list`" body=""> 
        <progress-bar :percent="dashboard.progress" />
      </TopBox>
    </div>
    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">My Groups</h6>
                  <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                          aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>

              <!-- Card Body -->
              <div class="card-body">
                  <div class="chart-area">
                      <GroupsList :groups="dashboard.groups" />
                  </div>
              </div>
          </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Project Progress</h6>
                  <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                          aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <!-- Card Body -->
              <div class="card-body"> 
                  <div class="chart-area">
                    <div v-for="project in dashboard.open_projects" >
                      <h4 class="small font-weight-bold">{{project.name}}<span
                              class="float-right">{{CalcProgressPercent(project.tasks)}}%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-success" role="progressbar" :style="{width: CalcProgressPercent(project.tasks) + '%'}"
                                  aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                    </div>
              </div>
          </div>
      </div> 
      </div>
  </div>
</template>

<script>
import { CalcProgressPercent } from '../../utlis/functions';
import TopBox from './TopBox.vue'
import GroupsList from '../groups/GroupsList.vue'

export default {
  name: "Dashboard",
  data() {
    return {
      dashboard: {
        groups: [],
        open_tasks: [],
        open_projects: [],
        open_tasks: [],
        open_tasks_count: null,
        open_projects_count: null,
        open_tasks_count: null,
        progress: 0,
        user: {}
      }
    }
  },
  components:{
    TopBox,
    GroupsList
  },
  methods: { CalcProgressPercent: CalcProgressPercent },
  async created(){
    axios
      .get(process.env.MIX_API_URL + '/api/dashboard')
      .then(response => {
        this.dashboard = response.data;
        console.log(this.dashboard.groups);
      })
  }
}
</script>