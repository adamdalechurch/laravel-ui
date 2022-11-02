export const GroupCols = [
    { 
        field: 'name',
        headerName: 'Name',
        filter: 'agTextColumnFilter',
        flex: 1,
        sortable: true
      },
      { 
        field: 'owner' ,
        flex: 1,
        headerName: 'Owner',
      },
      { 
        field: 'roles',
        flex: 1,
        headerName: 'My Group Roles',
      },
      { 
        field: 'created_at',
        flex: 1,
        headerName: 'Date Created',
        sortable: true
      }
]