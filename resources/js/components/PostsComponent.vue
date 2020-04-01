<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Posts</h1><br>

        </div>
            <h2>
                {{ post.name }}
            </h2>
            <h6 class="muted">
                Created:
                {{ post.created_on.substring(0, 9) }}
            </h6>
            <p v-html="post.body" v-bind="post.body">
            </p>
    </div>
</template>

<script>
    // import luxon;
    export default {
        data: function (){
            return{
                }
            },
        mounted() {
        },
        props: ['post'],
    }
</script>
<style scoped>
.muted{
    color: rgb(153, 153, 153);
}
</style>