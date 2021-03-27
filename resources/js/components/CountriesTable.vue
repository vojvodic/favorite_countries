<template>
  <div class="row">
    <div class="col-xs-12 col-sm-4 offset-sm-8">
      <div class="mb-3">
        <input type="text" class="form-control" v-model="search" autocomplete="off" :placeholder="labels.search">
      </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th v-for="header in headers" scope="col">
                {{ header.label }}
                <i class="bi bi-sort-up sort"></i>
              </th>
              <th scope="col" style="width: 5%;"></th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="country in unfavoriteCountries" v-show="( country.name.toUpperCase().includes(search.toUpperCase()) )">
                  <td>{{ country.name }}</td>
                  <td>{{ country.region }}</td>
                  <td>{{ country.population }}</td>
                  <td>
                      <button type="button" class="btn btn-outline-dark btn-sm" @click="addFavorite(country)">{{ labels.favorite }}</button>
                  </td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      favoriteCountries: Array,
      countries: Array,
      headers: Array,
      labels: Object
    },
    data: function() {
      return {
        unfavoriteCountries: [],
        search: '',
        sort: {
          name: 'name',
          order: 'asc'
        }
      }
    },
    created: function(){
      this.countries.forEach(country => {
        let exists = false;
        this.favoriteCountries.forEach(favoriteCountry => {
          if (country.name == favoriteCountry.name) {
            exists = true;
            return false;
          }
        });
        if (!exists) {
          this.unfavoriteCountries.push(country);
        }
      });
    },
    methods: {
      addFavorite: function(country){
        axios.post(config.baseUrl + '/favorites',country).then(response => {
          this.unfavoriteCountries.forEach((unfavoriteCountry, i) => {
            if (unfavoriteCountry.name == country.name) {
              this.unfavoriteCountries.splice(i,1);
              return false;
            }
          });
        }).catch(error => {
          if (error.response) {
            alert( error.response.data.message );
          }
        });
      }
    }
  }
</script>
