export const GetMyGroups = () => {
  return axios
  .get(process.env.MIX_API_URL + '/api/groups')
  .then(response => {
    return response.data.items;
  })
}