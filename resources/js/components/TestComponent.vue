<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">test Component</div>

                    <div class="card-body">
                        I'm an example component. <br>
                        {{ message }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Test mounted.')
        },
        props: ['message'],
    }
</script>
