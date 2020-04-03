<template>
    <div class="container">
        <h4>
            Latest Posts:
        </h4>
        <div class="row justify-content-center" v-for="post in latest" :key="latest">
            
            <a :href="'/posts/' + post.slug">
                <div class="col-md-8">
                    <div  class="card postDisplay">
                        <div class="card-header links" >
                            <h5>{{post.name}}</h5>
                        </div>
                    </div>
                </div>
            </a>

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
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a , .links>h5{
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .postDisplay{
                border: solid 1px #636b6f;
                border-radius: 5px;
                margin: 0 5px;
                background-color: #ebebeb;
            }
            .card{
                margin-bottom: 20px;
            }
            a{
                text-decoration: none;
            }
        </style>
