export const GroupCols = 
[
  { 
    field: 'name',
    headerName: 'Name',
    filter: 'agTextColumnFilter',
    flex: 1,
    sortable: true
  },
  { 
    field: 'owner',
    flex: 1,
    headerName: 'Owner',
    cellRenderer: 'UserCell'
  },
  { 
    field: 'roles',
    flex: 1,
    headerName: 'My Group Roles',
  },
  { 
    field: 'created_at',
    headerName: "Date Created",
    flex: 1,
    cellRenderer: 'DateCell',
  }
]