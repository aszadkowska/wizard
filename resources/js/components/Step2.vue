<template>
    <div class="panel panel-default">
        <div class="panel-heading">Wybierz litery</div>
        <div class="panel-body">
            <form class="form-group" action="./step2" method="POST" @submit.prevent="getData()">
                <div v-for="(n, i) in 10" class="form-group m-sm-3">
                    <select v-model="UUID.id[i]" required>
                        <option v-for="letter in data[0]">{{letter}}</option>
                    </select>
                </div>
                <button class="btn btn-info pull-right"
                        type="submit">Zapisz do bazy
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Step2",
        props: ['data'],
        data() {
            return {
                UUID: {id: []}
            }
        },
        methods: {
            prev() {
                this.step--;
                this.$emit('site-details2', {step: '1', data: ''});
            },
            getData() {
                axios.post("./step2", [this.data[1], this.data[2], this.UUID]).then(response => {
                    this.$emit('site-details', {step: '3', data: response.data});
                });
            },
        },
    }
</script>
