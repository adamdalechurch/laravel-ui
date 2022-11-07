export const UserCols = 
[
  { 
    field: 'name',
    headerName: 'Name',
    flex: 1,
    sortable: true,
    cellRenderer: 'ItemLinkCell',
    cellRendererParams: {
      itemName: "user"
    }
  },
  { 
    field: 'email',
    flex: 1,
    headerName: 'Email',
  },
  { 
    field: 'created_at',
    headerName: "Date Created",
    flex: 1,
    cellRenderer: 'DateCell',
  }
]