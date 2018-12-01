<template>
    <div class="card">
        <div class="card-header">Book ward councilor for funerals or community meetings</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">Book ward councilor for </label>

                        <div class="col-md-6">
                            <select name="plan_type_id" id="plan_type_id" class="form-control">
                                <option value="">Funeral </option>
                                <option value="">Community meeting</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"  >


                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">Start Date And Time</label>

                        <div class="col-md-6">
                            <input type="datetime-local" id="meeting-time"
                                   name="meeting-time" value="2018-06-12T19:30"
                                   min="2018-06-07T00:00" max="2018-06-14T00:00" class="form-control">


                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">End Date And Time</label>

                        <div class="col-md-6">
                            <input type="datetime-local" id="meeting-time"
                                   name="meeting-time" value="2018-06-12T19:30"
                                   min="2018-06-07T00:00" max="2018-06-14T00:00" class="form-control">


                        </div>
                    </div>
                    <div class="form-group row text-center offset-md-3">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "bookings"
    }
</script>

<style scoped>

</style>