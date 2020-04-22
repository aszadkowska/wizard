<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="./com" method="POST" @submit.prevent="getData()">
                <div class="form-group">
                    <label for="province">Wybierz województwo</label>
                    <select class="form-control" id="province" v-model="form.province" required>
                        <option>dolnośląskie</option>
                        <option>kujawsko-pomorskie</option>
                        <option>lubelskie</option>
                        <option>łódzkie</option>
                        <option>małopolskie</option>
                        <option>świętokrzyskie</option>
                        <option>wielkopolskie</option>
                        <option>zachodniopomorskie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="from">Zakres dat</label>
                    <input type="date" min="1950-01-01" class="form-control" name="from" id="from" v-model="form.from" required/>
                </div>
                <div class="form-group">
                    <label for="to">Zakres dat</label>
                    <input type="date" max="2031-12-31" class="form-control" name="to" id="to" v-model="form.to" required/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" v-model="form.email" required/>
                </div>
                <div class="form-group">
                    <button class="btn btn-info pull-right"
                            type="submit">Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Step1",
        data() {
            return {
                step: 1,
                site: {SiteID: null, SiteName: null},
                form: {province: null, from: null, to: null, email: null}
            }
        },
        methods: {
            getData() {
                axios.post("./com", this.form).then(response => {
                    this.$emit('site-details', {step: '2', data: response.data});
                });
            },
        }
    }
</script>
