//class Models
<div class="modal fade" id="addTrainerModal" tabindex="-1" role="dialog" aria-labelledby="addTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTrainerModalLabel">Add Trainer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="trainerName">Trainer Name</label>
                        <input type="text" class="form-control" id="trainerName" required>
                    </div>
                    <div class="form-group">
                        <label for="trainerSpecialization">Specialization</label>
                        <input type="text" class="form-control" id="trainerSpecialization" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Trainer</button>
                </form>
            </div>
        </div>
    </div>
</div>
//class Schedule

<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Add Class Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="className">Class Name</label>
                        <input type="text" class="form-control" id="className" required>
                    </div>
                    <div class="form-group">
                        <label for="trainerSelect">Select Trainer</label>
                        <select class="form-control" id="trainerSelect" required>
                            <option>John Doe</option>
                            <option>Jane Smith</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classDateTime">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="classDateTime" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                </form>
            </div>
        </div>
    </div>
</div>
