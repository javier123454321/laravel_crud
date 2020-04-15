<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                {{ post.name }} a
            </h2>
        </div>

            <h6 class="muted">
                Created:
                {{ post.created_at.substring(0, 10) }} by <span style="font-weight: 800;">{{ post.user_id }}</span>
            </h6>
            <p class="postBody" v-html="post.body">
            </p>
            <div class="tag-container">
                <div class="tag-box"
                    v-for="tag in tags" :key="tags">
                    <a :href="'/posts?search=' + tag">
                        {{tag}}
                    </a>
                </div>
            </div>
    </div>
</template>

<script>
    // import luxon;
    export default {
        data: function (){
            return{
                author: this.getAuthor()
                }
            },
        methods: {
            getAuthor(){
                return this.post.user_id;
            }
        },
        mounted() {
        },
        props: ['post', 'tags'],
    }
</script>
<style scoped lang="scss">
.muted{
    color: rgb(153, 153, 153);
}
.postBody{
    margin: 40px 80px;
    max-width: 800px;
}
.tag-container{
  display: flex;
  flex-direction: row;
  .tag-box{
      padding: 5px 10px;
      margin-right: 5px;
      background-color: rgba(0, 0, 0, .1);
      border-radius: 2px;
  }
}
</style>