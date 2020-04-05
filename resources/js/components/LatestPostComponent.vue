<template>
<div class="flex-center position-ref full-height">
    <div class="container">
        <h4>
            Latest Posts:
        </h4>
        <div class="row justify-content-center" v-for="post in latest" :key="latest">
            
            <a class="postDisplay" :href="'/posts/' + post.slug">
                <div  class="card">
                    <div class="card-header links" >
                        <h5>{{post.name}}</h5>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                post: null,
            }
        },
        methods: {
            async getLatest(){
                window.console.log('Component mounted.')
                fetch('/api/latestPost')
                .then(response =>{
                    window.console.log(response)
                })
                .then((data) => {
                    window.console.log(data);
                    this.post = data;
                })
                .catch((response) => {
                    window.console.log("respnse: "+response)
                })
                .finally(()=>{
                    window.console.log('finally')
                })
            }
        },
        mounted() {
            this.getLatest();
        },
        props: ['latest']
    }
</script>
<style>
    .links > a , .links > h5{
        color: #636b6f;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
    }

    .postDisplay{
        margin-bottom: 10px;
    }

    a{
        text-decoration: none;
    }
    .card{
        width:100%;
        margin-bottom: 10px;
    }
    .card-header{
        width: 300px;
    }

</style>
