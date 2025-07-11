import './bootstrap';
import $, { data } from 'jquery';
window.$ = $;
window.jQuery = $;

$(window).on("load", function(){

    const formBox = $("#form-box");
    const closeDetails =$("#close-details");
    const updateBtn = $("#update-btns");
    const createBtn =$("#create-btns");
    const headEl =$("#heading-el");
    const closeEdit =$("#close-edit");
    const createForm = $('#create-form');
    const titleErrorEl =$('#title-error');
    const salaryErrorEl =$('#salary-error');
    const titleInputEl =$('#title');
    const salaryInputEl=$('#salary');


    // Getting jobs section.
const jobsDivEl = $('#jobs-div');
const baseUrl = $('meta[name="base-url"]').attr('content');

function fetchJobs(page = 1){

fetch(`${baseUrl}/get-jobs?page=${page}`)
    .then((response)=>{
        if(!response.ok){
        throw new Error("status code error.");
        }
        return response.json();
    })
    .then(data =>{
        const jobs = data.data;
        jobsDivEl.empty();
            jobs.forEach(job => {
                jobsDivEl.append(`
                    <div class="d-flex  align-items-start justify-content-between mt-4  border border-light bg-light rounded-3 shadow-lg">
                        <div class="job-card pe-5 p-2"
                                data-id="${job.id}"
                                data-title="${job.title}"
                                data-salary="${job.salary}"
                                data-employer="${job.employer.name}"
                                data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                    <div class="text-primary">${job.employer.name}</div>
                                    <b>${job.title}</b> <pre><b class="">Pays: </b> ${job.salary} per Month.</pre>
                        </div>
                    <button id="edit-job-btn" class="btn btn-outline-dark mt-4 rounded"
                            data-id="${job.id}"
                            data-title="${job.title}"
                            data-salary="${job.salary}">
                         <i class="far fa-edit"></i>
                    </button>
                    </div>
                    `);
            });

            // pagination
            const paginationDiv = $("#pagination");
            paginationDiv.empty();

            if(data.prev_page_url){
                paginationDiv.append(`<button class="btn btn-secondary me-2" id="prev-btn">Prev</button>`);
                $("#prev-btn").on("click", ()=> fetchJobs(page - 1));
            }

            if(data.next_page_url){
                paginationDiv.append(`<button class="btn btn-primary" id="next-btn" >Next</button>`);
                $("#next-btn").on("click", ()=> fetchJobs(page + 1));
            }

    }).catch((err)=>{
        console.log('rejected: ', err);
    });

    }

    fetchJobs();

                // Storing jobs section.


createForm.on("submit", function(e){
    e.preventDefault();

    const formData = {
        title:titleInputEl.val(),
        salary:salaryInputEl.val()
    }
    titleErrorEl.addClass('d-none').text('');
    salaryErrorEl.addClass('d-none').text('');

    fetch(`${baseUrl}/ajax-create-jobs`, {
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'Accept':'application/json',
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(formData)
    })
    .then(async res =>{
        const data = await res.json();
        if(!res.ok){
            if(data.errors){
                if(data.errors.title){
                    titleErrorEl
                    .text(data.errors.title[0])
                    .removeClass('d-none')
                    .fadeIn()
                    .delay(4000)
                    .fadeOut();
                }
                if(data.errors.salary){
                    salaryErrorEl
                    .text(data.errors.salary[0])
                    .removeClass('d-none')
                    .fadeIn()
                    .delay(4000)
                    .fadeOut();
                }
            }
            throw new Error("validation failed");
        }
        if(res.ok){
        $('#form-response')
        .text(data.message)
        .removeClass('d-none')
        .fadeIn()
        .delay(2000)
        .fadeOut();
        console.log(data.message);
        fetchJobs();
        titleInputEl.val('');
        salaryInputEl.val('');
        }

    })
    .catch(err =>{
        alert(err);
        console.log("other errors:", err)
    });

});


            // Deleting jobs section.

     $("#delete-btn").on("click", function(){

        const jobId = $(this).attr("data-id");

        fetch(`${baseUrl}/ajax-delete/${jobId}`, {
            method:'DELETE',
            headers:{
                'Accept':'application/json',
                'X-CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            }
        })
        .then((res)=>{
            if(!res.ok){
                throw new Error("Error: ");
            }
            return res.json();
        })
        .then(data=>{
            console.log(data.message);
            fetchJobs();
        })
        .catch(err=>{
            console.log(err);
            alert("this job does not belong to you");
        });
         headEl.text("Create a Job");
        updateBtn.addClass('d-none');
        createBtn.removeClass('d-none');

            titleInputEl.val("");
            salaryInputEl.val("");
    });

        //  Details section.


    jobsDivEl.on("click", ".job-card", function(){

        const title = $(this).data("title");
        const salary =$(this).data("salary");
        const employer =$(this).data("employer");

        $("#detail-title").text(title);
        $("#detail-salary").text(salary);
        $("#detail-employer").text(employer);


    });

    closeDetails.on("click", function(){
        formBox.removeClass('d-none');
        updateBtn.addClass('d-none');
        createBtn.removeClass('d-none');
        headEl.text("Create a Job");

            titleInputEl.val("");
            salaryInputEl.val("");
    });


    // Edit and Update section.

    jobsDivEl.on("click","#edit-job-btn",function(){
        formBox.removeClass('d-none');
        updateBtn.removeClass('d-none');
        createBtn.addClass("d-none");
        headEl.text("Edit Form");
        const id =$(this).data("id");

        $("#delete-btn").attr("data-id",id);
        $("#update-btn").attr("data-id", id);

        const editTitle = $(this).data("title");
        const editSalary =$(this).data("salary");
        titleInputEl.val(editTitle);
        salaryInputEl.val(editSalary);

    });

    closeEdit.on("click", function(){
        headEl.text("Create a Job");
        updateBtn.addClass('d-none');
        createBtn.removeClass('d-none');

            titleInputEl.val("");
            salaryInputEl.val("");
    })



        // Updating the job

         $("#update-btn").on("click",function(e){
            e.preventDefault();
             const formData = {
                title:titleInputEl.val(),
                salary:salaryInputEl.val()
            }

            titleErrorEl.addClass('d-none').text('');
            salaryErrorEl.addClass('d-none').text('');

            const jobId = $(this).attr("data-id");
            fetch(`${baseUrl}/ajax-update/${jobId}`,{
                method:'PATCH',
                headers:{
                    'Content-Type':'application/json',
                    'Accept':'application/json',
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                body:JSON.stringify(formData),
            })
             .then(async res =>{
            const data = await res.json();
            if(!res.ok){
                if(data.errors){
                    if(data.errors.title){
                        titleErrorEl
                        .text(data.errors.title[0])
                        .removeClass('d-none')
                        .fadeIn()
                        .delay(4000)
                        .fadeOut();
                    }
                    if(data.errors.salary){
                        salaryErrorEl
                        .text(data.errors.salary[0])
                        .removeClass('d-none')
                        .fadeIn()
                        .delay(4000)
                        .fadeOut();
                    }
                }
                throw new Error("validation failed");
            }
            if(res.ok){
            $('#form-response')
            .text(data.message)
            .removeClass('d-none')
            .fadeIn()
            .delay(1000)
            .fadeOut();
            console.log(data.message);
            fetchJobs();
            titleInputEl.val('');
            salaryInputEl.val('');

            $("#update-btn").removeAttr("data-id");
            updateBtn.addClass('d-none');
            createBtn.removeClass('d-none');
            headEl.text("Create a Job");
            }

        })
        .catch(err =>{
            alert(err);
            console.log("other errors:", err)
        });

    });










});

