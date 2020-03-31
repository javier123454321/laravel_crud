<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Posts</h1><br>

        </div>
            <p>
                {{ post }}
            </p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Test mounted.')
        },
        props: ['post'],
    }
</script>