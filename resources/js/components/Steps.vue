<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" v-show="this.step == 1">
                <step1 :data="this.data" @site-details="show"></step1>
            </div>
            <div class="col-md-8 col-md-offset-2" v-show="this.step == 2">
                <step2 :data="this.data" @site-details2="show"></step2>
            </div>
            <div class="col-md-8 col-md-offset-2" v-show="this.step == 3">
                <step3 :data="this.data" @site-details3="show"></step3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Steps",
        data() {
            return {
                step: 1,
                data: '',
            }
        },
        methods: {
            show(value) {
                this.step = value.step;
                this.data = value.data;
            },
        },
    }
</script>
