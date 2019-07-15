<template>
<div >
<form class="form-inline">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <li class="nav-item dropdown">
      <input type="text" class="form-control nav-link dropdown-toggle" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
      v-model="search" @keyup="searchit" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

            <div class="dropdown-menu dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <ul class="list-group " v-if="users.length">
                <li class="list-group-item" v-for='user in users' v-bind:key="user.id">
                   <a :href='"/profile/"+ user.id'> @{{user.username}}</a>
                    </li>
                </ul>
                <ul v-else>no item found</ul>
            </div>
        </li>
    </div>
  </form>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
            users:[],
            search:""
            }
        },
        methods:{
            searchit(){
                axios.get("/search/"+this.search).then(response => {
                    this.users =  response.data;
                }).catch(errors => {
                    console.log(errors.data)
                });
            }
        }
    }
</script>
