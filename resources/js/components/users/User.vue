<template>
  <page :title="user.name" :showHeader="false">
    <template v-slot:backlink>
      <router-link  :to="`/users/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Users
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a :class="[baseLinkClass, {'active': detailsVisibile}]"  @click="showDetails" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
            <a :class="[baseLinkClass, {'active': groupsVisibile}]"   @click="showGroups" id="nav-groups-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Groups</a>
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisibile" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <UserForm :item="user"></UserForm>
          </fieldset>
        </div>
        <div v-if="groupsVisibile" class="tab-pane fade show active" id="nav-groups" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="groupCols.length > 0"
            :columnDefsProp="groupCols"
            itemName='Group'
            title='Groups'
            :rowDataProps="user.groups"
            :propItem="item"
            :showEdit="false"
            :showDelete="false"
            :showAdd="false"
          >
            <template v-if="item != null" v-slot="{item}">
              <GroupForm :item="item" />
            </template>
          </grid>
        </div> 
      </div>
    </template>
  </page>
</template>
<script>
import UserForm from './UserForm.vue';
import StatusCell from '../common/StatusCell.vue';
import { GroupCols } from '../groups/GroupCols';
import GroupForm from '../groups/GroupForm';

export default {
  name: 'User',
  data() {
    return {
      user: {},
      item: null,
      detailsVisibile: true,
      groupsVisibile: false,
      groupCols: GroupCols,
      baseLinkClass: "nav-item nav-link"
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/users/${this.$route.params.id}`)
      .then(response => {
          this.user = response.data.item;
          this.item = { user_id: this.user.id};
      }) 
  },
  components: {
    UserForm,
    StatusCell,
    GroupForm
  },
  methods: {
    showDetails: function (){
      this.detailsVisibile = true;
      this.groupsVisibile = false;
    },
    showGroups: function (){
      this.detailsVisibile = false;
      this.groupsVisibile = true;
    },
  }
}
</script>
