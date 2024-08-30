<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logo_logo 1.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TY Logistics Park FZE</title>
    <meta name="description" content="TY Logistics Park FZE." />
</head>

<body>
    <section class="h-screen flex flex-row">
        <div class="w-1/4">
            <div class="w-full flex justify-center">
                <img src="../../assets/images/logo_logo 1.png" loading="lazy" alt="Logo"
                    class="w-36 h-14 hidden lg:flex" />
            </div>
            <a href="../" class="w-full flex justify-center bg-gray-200 py-4 hover:bg-yellow-300" id="activate_user">
                <h2 class="font-semibold text-lg">Users</h2>
            </a>
            <a href="./" class="w-full flex justify-center mt-1 bg-yellow-300 py-4" id="activate_blog">
                <h2 class="font-semibold text-lg">Blogs</h2>
            </a>
            <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4">
                <h2 class="font-semibold text-lg">Logout</h2>
            </div>
        </div>

        <div class="grow bg-yellow-300 justify-center flex overflow-y-auto pt-8">

            <!--blog-->

            <div class="w-3/4" id="blog_div">
                <!-- Add Blog-->
                <div class="w-full h-fit p-4 bg-white flex flex-col gap-4" id="blog_form">
                    <div class="w-full flex justify-between items-center">
                        <div class="w-full">
                            <h1 class="font-semibold text-2xl text-center">Add Blog</h1>
                        </div>
                    </div>
                    <form class="w-full flex flex-col justify-center items-center gap-4">
                        <div class="w-full flex flex-col gap-2">
                            <input type="text" id="title" class="bg-gray-200 py-2 pl-4 rounded-md"
                                placeholder="Enter blog title" />
                        </div>

                        <div class="h-96 w-full bg-gray-200 relative" id="blog_img_div">
                            <input type="file" id="blog_image" accept="image/png, image/gif, image/jpeg"
                                class="bg-gray-200 py-2 pl-4 rounded-md absolute top-0 h-full w-full opacity-0"
                                placeholder="Enter user first name" />
                            <div class="w-full h-full flex flex-col justify-center items-center">
                                <i class="fa-solid fa-camera text-dark_background" style="font-size: 4rem"></i>
                                <h1>Click to select blog image</h1>
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <textarea placeholder="Add blog details"
                                class="bg-gray-200 h-60 py-2 pl-4 rounded-md"></textarea>
                        </div>

                        <div class="w-full flex justify-center gap-2">
                            <button type="submit"
                                class="bg-dark_background mt-4 px-4 text-white h-10 rounded-md w-fit hover:bg-yellow-300 hover:text-dark_text_para">
                                Add User
                            </button>

                            <button type="button" id="cancel"
                                class="bg-gray-200 mt-4 px-4 text-black h-10 rounded-md w-fit hover:bg-yellow-300">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Add Blog-->
            </div>

            <!--end blog-->
        </div>
    </section>

    <script src="../../js/dashboard/controller.js"></script>
</body>

</html>