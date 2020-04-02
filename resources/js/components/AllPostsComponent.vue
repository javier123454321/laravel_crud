<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>All Posts</h1><br>
        </div>
       <div class="post card" v-for="post in posts" :key="posts">
            <h3>
               {{ post.name }}
            </h3>
            <a v-bind:href="'/posts/' + post.slug">Read More...</a>
       </div>
            <!-- <button class="btn btn-primary" @click="fetchPosts">fetch Posts</button> -->
    </div>
</template>

<script>
    // import luxon;
    export default {
        data: function (){
            return{
                }
            },
        methods:{
            fetchPosts: async function(){
            const headers = new Headers({
                    'Content-Type': 'x-www-form-urlencoded',
                    'X-CSRF-TOKEN': this.csrf
                });
                fetch('/api/posts', {
                    method: 'POST',
                    headers,
                }).then((response)=>{
                    window.console.log(response)
                    return response})
                .then((data) => {
                    this.posts = data[0]
                    window.console.log(data)
                })
                .catch((error)=>{
                    window.console.log(error)
                })
            }
        },
        mounted() {
            // this.fetchPosts();
        },
        props: ['csrf', 'posts'],
    }
</script>
<style scoped>
.muted{
    color: rgb(153, 153, 153);
}
.card{
    padding: 40px;
    margin-bottom: 30px;
}
</style>