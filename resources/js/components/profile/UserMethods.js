export const GetUsers = () => {
  return axios
  .get(process.env.MIX_API_URL + '/api/users')
  .then(response => {
    return response.data.items;
  })
}