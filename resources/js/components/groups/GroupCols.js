export const GroupCols = 
[
  { 
    field: 'name',
    headerName: 'Name',
    flex: 1,
    sortable: true,
    cellRenderer: 'ItemLinkCell',
    cellRendererParams: {
      itemName: "group"
    }
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