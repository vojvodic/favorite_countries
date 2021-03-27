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
              </th>
              <th scope="col" style="width: 5%;"></th>
            </tr>
            </thead>
            <tbody>
              <template v-for="(country,index) in favoriteCountries">
                <tr v-show="( country.name.toUpperCase().includes(search.toUpperCase()) )" :class="{ 'show-comments': isActive(index) }">
                  <td>
                    <button type="button" class="btn btn-light btn-sm" :title="labels.comments" @click="setActive(index)">
                      <i class="bi bi-chat-text"></i> {{ country.country_comments.length }}
                    </button>
                    {{ country.name }}
                  </td>
                  <td>{{ country.region }}</td>
                  <td>{{ country.population }}</td>
                  <td>
                      <button type="button" class="btn btn-outline-danger btn-sm" @click="removeFavorite(index)">{{ labels.remove }}</button>
                  </td>
                </tr>
                <tr v-show="( isActive(index) )">
                  <td colspan="4" class="pb-">
                    <div class="row">
                      <div class="col-xs-6 col-sm-4">
                        <div class="form-group mb-3">
                          <textarea class="form-control form-control-sm" v-model="favoriteCountries[index].new_comment_value" rows="2" :placeholder="labels.comment"></textarea>
                        </div>
                        <div class="form-group text-end">
                          <button type="button" class="btn btn-primary btn-sm" @click="addComment(index)">{{ labels.add }}</button>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-8">
                        <p>
                          {{ labels.comments }}
                          <small v-show="!country.country_comments.length" class="text-muted d-block">
                            {{ labels.no_comments }}
                          </small>
                        </p>
                        <table class="table">
                          <tr v-for="(comment,index) in country.country_comments">
                            <td>{{ comment }}</td>
                            <td>{{ comment.created_at }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
              </template>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      initalFavoriteCountries: Array,
      headers: Array,
      labels: Object
    },
    data: function() {
      return {
        favoriteCountries: this.initalFavoriteCountries,
        search: ''
      }
    },
    created: function(){
      this.favoriteCountries.forEach((country, index) => {
        country.active = false;
        country.new_comment_value = '';
        this.$set(this.favoriteCountries, index, country);
      });
    },
    methods: {
      removeFavorite: function(index){
        if( !confirm(this.labels.confirm_remove) ){
          return false;
        }
        let country = this.favoriteCountries[index];
        axios.delete(config.baseUrl + '/favorites/' + country.id).then(response => {
          this.favoriteCountries.forEach((favoriteCountry, i) => {
            if (favoriteCountry.id == country.id) {
              this.favoriteCountries.splice(i,1);
              return false;
            }
          });
        }).catch(error => {
          if (error.response) {
            alert( error.response.data.message );
          }
        });
      },
      isActive: function(index){
        return this.favoriteCountries[index]['active'];
      },
      setActive: function(index){
        let country = this.favoriteCountries[index];
        country.active = country.active ? false : true;
        this.$set(this.favoriteCountries, index, country);
      },
      addComment: function(index){
        let country = this.favoriteCountries[index];
        axios.post(config.baseUrl + '/favorites/' + country.id + '/comments',{comment : country.new_comment_value}).then(response => {
          this.favoriteCountries.country_comments.push(response.data);
        }).catch(error => {
          if (error.response) {
            alert( error.response.data.message );
          }
        });
      }
    }
  }
</script>
