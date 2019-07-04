<template>
    <div>
        <button class="btn" v-bind:class="activeClass" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props:['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
            return{
                status: this.follows,   
            }
            
        },

        methods:{
            followUser(){
                axios.post('/follow/'+this.userId).then(reponse =>{
                    this.status =!this.status;
                    console.log(reponse.data);
                }).catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },
        computed:{
            buttonText(){
                return (this.status) ? 'Unfollow':'Follow';
            },
            activeClass(){
                return (!this.status) ? 'btn-primary':'btn-light';
            }
        }
    }
</script>
