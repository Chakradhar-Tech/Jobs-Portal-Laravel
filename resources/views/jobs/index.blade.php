<x-layout>
     <x-slot name="header">
        <h2>Jobs</h2>
     </x-slot>
     <div class="container-fluid px-3 py-3">
     <div class="row gx-3">

     <div class="col-md-7 mx-2 my-1">
        <div class="row gx-3 gy-3" id="jobs-div"></div>
        <div class="mt-3 mb-5" id="pagination"></div>
    </div>

     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="detail-title"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3 h3 fw-bold">Details:</p>
                     <p><strong>Salary: </strong><span id="detail-salary"></span></p>
                    <p><strong>Employer: </strong><span id="detail-employer"></span></p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="col-md-4 ms-5" id="form-box">
    <x-slot name="header">
        <h2>Create Job</h2>
     </x-slot>

    <x-form-field class="w-100 mt-0">

        <x-slot name="header">
            <p id="heading-el">Create a Job</p>
        </x-slot>
        <p class="alert alert-success fw-bold d-none" id="form-response"></p>
        <p id="title-error" class="alert alert-danger fw-bold d-none"></p>
        <p id="salary-error" class="alert alert-danger fw-bold d-none"></p>

    <form class="p-3" method="POST" id="create-form">

        @csrf

        <div class="form-group mb-3">

            <x-form-label for="title">Job Title</x-form-label>

            <x-form-input name="title" id="title"  />

        </div>

        <div class="form-group mb-3">

            <x-form-label for="salary" >salary</x-form-label>

            <x-form-input name="salary" id="salary" />

          </div>
        <div class="d-flex justify-content-between" id="create-btns">
            <a href="{{ url('/') }}" class="btn btn-outline-danger">Cancel</a>
            <x-form-button class="btn btn-outline-primary" type="submit">Save</x-form-button>
        </div>

        <div class="d-flex justify-content-between d-none" id="update-btns">
            <div>
                <button type="button" class="btn btn-outline-danger delete-btn" data-id="" id="delete-btn">Delete</button>
            </div>
            <div>
                <button id="close-edit" class="btn btn-outline-dark" type="button">Close</button>
                <button type="submit" id="update-btn" class="btn btn-outline-primary">Update</button>
            </div>
        </div>
        </form>
</x-form-field>
</div>
</div>
</div>
    </x-layout>
