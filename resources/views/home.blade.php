<x-layout>

    <style>

        .hero{
            padding-top:0px ;
            padding-bottom: 50px;
            margin-bottom: 30px;
            text-align: center;
        }
        .hero2{
            padding-top:100px;
            padding-bottom:100px;
            margin-bottom:30px ;
        }
        h3{
            text-align: center;
            margin: 10px;
        }
        h1{
            font-family:'Times New Roman', Times, serif;
        }
        p{
            text-align: center;
            font-family:Arial, Helvetica, sans-serif;
            font-size:20px;
        }
        .box{

            background-color: whitesmoke;
            box-shadow:5px 5px 10px rgba(0, 0, 0, 0.3);
            padding: 15px;
            border: 1px solid black;
            border-radius:6px;
            height: 100%;
            padding-right: 7px;
            font-style:italic;
        }
        section{
            margin-bottom: 50px;
        }
        .intro-banner{
            background:linear-gradient(to right, #0d6efd, #6610f2);
            color: white;
        }
        .scroll-wrapper{
            overflow: hidden;
            position: relative;
        }
        .scroll-track{
            animation: scroll-left 30s linear infinite;
            display: flex;
            width: max-content;
        }
        @keyframes scroll-left{
            0% {
                transform:translatex(0%);
            }
            100% {
                transform:translatex(-50%);
            }
        }
    </style>

    <main>
    <section>

        <section class="intro-banner text-center py-4 text-light bg-dark">

            <div class="container">
                <h2 class="dispaly-6 fw-bold">Welcome to JobFinder!!</h2>
                <p class="lead">Your journey to the perfect job starts here.</p>
            </div>

        </section>
        <div class="hero container-fluid">
           <img src="public/image.jpg" alt="Job Site Banner" style="max-width: 50%; height: auto;">
            <h3 class="fw-semibold">Looking For Jobs Join Our Community</h3>
            @auth
            <a href="{{ url('/jobs') }}" class="btn btn-primary">Find Jobs</a>
            <a href="{{ url('/jobs/create') }}" class="btn btn-primary">Create Job</a>
            @endauth
        </div>

    </section>

    <section>

        <div class="hero2 container-fluid bg-primary text-light text-center mb-3 ">
            <h1 class="fw-semibold">Find your passion - And get your job.</h1>
             <p>Find your next opportunity with us — a smart, simple space where talent meets opportunity and careers take shape.
                Whether you're just starting out or aiming for your next big move, we connect you with jobs that match your skills,
                interests, and goals. Your future begins here.</p>
        </div>

    </section>

    <section>
        <h3 class="mb-5">Reviews</h3>
            <div class="container-fluid px-4">
                <div class="scroll-wrapper">
                    <div class="scroll-track d-flex gap-3">
                        @for ($i=0;$i<2;$i++ )

                            <div class="box">
                                <p>This has been a good opportunity for me in my life.</p>
                            </div>

                            <div class="box">
                                <p>We appreciate it's user friendly interface.</p>
                            </div>

                            <div class="box ">
                                <p>I got an good Job offer with favourable conditions.</p>
                            </div>

                            <div class="box ">
                                <p>I am happy to get my skills recognized.</p>
                            </div>
                             <div class="box ">
                                <p>By working here, I have increased my experience.</p>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
    </section>
     </main>
</x-layout>
