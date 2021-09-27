<template>
    <div>
        <nav class="site-nav">
            <div class="container">
                <div class="site-navigation">
                    <div class="row">
                        <div
                            class="col-md-5 text-center order-1 order-md-2 mb-3 mb-md-0"
                        >
                            <a
                                href="index-2.html"
                                class="logo m-0 text-uppercase"
                                >MagDesign</a
                            >
                        </div>
                        <div class="col-md-3 order-3 order-md-1">
                            <form action="#" class="search-form">
                                <span class="icon-search2"></span>
                                <input
                                    type="search"
                                    class="form-control"
                                    placeholder="Search..."
                                />
                            </form>
                        </div>
                        <div
                            class="col-md-4 text-end order-2 order-md-3 mb-3 mb-md-0"
                        >
                            <div class="d-flex">
                                <ul class="list-unstyled social me-auto">
                                    <li>
                                        <a href="#"
                                            ><span class="icon-twitter"></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span class="icon-facebook"></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span class="icon-instagram"></span
                                        ></a>
                                    </li>
                                    <li v-if="user.name">
                                        <a href="#">{{ user.name }}</a>
                                    </li>

                                    <li v-if="user.name">
                                        <router-link to="/logout">
                                            Logout
                                        </router-link>
                                    </li>

                                    <li v-else>
                                        <router-link to="/login"
                                            >Login</router-link
                                        >
                                    </li>
                                </ul>

                                <a
                                    class="burger ms-auto float-end site-menu-toggle d-inline-block"
                                    v-on:click="onshow"
                                >
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <transition
                        name="slide"
                        enter-active-class="animated fadeIn"
                        leave-active-class="animated fadeOut"
                    >
                        <div v-if="show">
                            <ul
                                class="d-lg-inline-none text-start site-menu float-end"
                            >
                                <div class="site-mobile-menu-header">
                                    <div class="site-mobile-menu-close">
                                        <span
                                            v-on:click="onshow"
                                            class="icofont-close js-menu-toggle"
                                        ></span>
                                    </div>
                                </div>
                                <li class="active">
                                    <a href="index-2.html">Home</a>
                                </li>
                                <li class="has-children">
                                    <a href="categories.html">Categories</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Travel</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">Business</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </transition>
                </div>
            </div>
        </nav>
        <div class="section pt-5 pb-0">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <div v-if="user.name">
                            <h2 class="heading">
                                Trending
                            </h2>
                        </div>
                        <div v-else>
                            No user
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="posts-slide-wrap">
                            <tiny-slider
                                :mouse-drag="true"
                                :controls="false"
                                :loop="true"
                                items="1"
                                gutter="20"
                            >
                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_1.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_2.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_3.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_4.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </tiny-slider>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_2.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="single.html"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_3.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="single.html"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_4.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="#"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_4.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="#"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_5.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="#"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="single.html">
                                    <img
                                        src="images/img_6.jpg"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>,
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="#"
                                        >Your most unhappy customers are your
                                        greatest source of learning.</a
                                    >
                                </h2>
                                <p>
                                    Far far away, behind the word mountains, far
                                    from the countries Vokalia and Consonantia,
                                    there live the blind texts.
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            src="images/person_1.jpg"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>Sergy Campbell</strong>
                                        <span>CEO and Founder</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading">Most Popular Posts</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="posts-slide-wrap">
                            <tiny-slider
                                :mouse-drag="true"
                                :loop="true"
                                items="1"
                                gutter="20"
                                mode="gallery"
                                :arrowKeys="true"
                            >
                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_1.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_2.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_3.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="post-entry d-lg-flex">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    src="images/post_lg_4.jpg"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category"
                                                    >Business</a
                                                >,
                                                <a href="#" class="category"
                                                    >Travel</a
                                                >
                                                &mdash;
                                                <span class="date"
                                                    >July 2, 2020</span
                                                >
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html"
                                                    >Your most unhappy customers
                                                    are your greatest source of
                                                    learning.</a
                                                >
                                            </h2>
                                            <p>
                                                Far far away, behind the word
                                                mountains, far from the
                                                countries Vokalia and
                                                Consonantia, there live the
                                                blind texts. Separated they live
                                                in Bookmarksgrove right at the
                                                coast of the Semantics, a large
                                                language ocean.
                                            </p>
                                            <a
                                                href="#"
                                                class="post-author d-flex align-items-center"
                                            >
                                                <div class="author-pic">
                                                    <img
                                                        src="images/person_1.jpg"
                                                        alt="Image"
                                                    />
                                                </div>
                                                <div class="text">
                                                    <strong
                                                        >Sergy Campbell</strong
                                                    >
                                                    <span>CEO and Founder</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </tiny-slider>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2 class="h4 fw-bold">Sports</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_2.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_3.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_4.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2 class="h4 fw-bold">Business</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_2.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_3.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div
                                    class="post-entry d-md-flex xsmall-horizontal mb-5"
                                >
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img
                                            src="images/img_4.jpg"
                                            alt="Image"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            <a href="#" class="category"
                                                >Business</a
                                            >,
                                            <a href="#" class="category"
                                                >Travel</a
                                            >
                                            &mdash;
                                            <span class="date"
                                                >July 2, 2020</span
                                            >
                                        </div>
                                        <h2 class="heading">
                                            <a href="single.html"
                                                >Your most unhappy customers are
                                                your greatest source of
                                                learning.</a
                                            >
                                        </h2>
                                        <a
                                            href="#"
                                            class="post-author d-flex align-items-center"
                                        >
                                            <div class="author-pic">
                                                <img
                                                    src="images/person_1.jpg"
                                                    alt="Image"
                                                />
                                            </div>
                                            <div class="text">
                                                <strong>Sergy Campbell</strong>
                                                <span
                                                    >Author, 26 published
                                                    post</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 bg-light mx-md-3 sec-subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="h4 fw-bold">Subscribe to newsletter</h2>
                    </div>
                </div>
                <form action="#" class="row">
                    <div class="col-md-8">
                        <div class="mb-3 mb-md-0">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email"
                            />
                        </div>
                    </div>
                    <div class="col-md-4 d-grid">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Subscribe"
                        />
                    </div>
                </form>
            </div>
        </div>
        <div class="site-footer">
            <div class="container">
                <div class="row justify-content-center copyright">
                    <div class="col-lg-7 text-center">
                        <div class="widget">
                            <ul class="social list-unstyled">
                                <li>
                                    <a href="#"
                                        ><span class="icon-facebook"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-twitter"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-linkedin"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-youtube-play"></span
                                    ></a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <p>
                                Copyright &copy; 2021 All rights reserved | This
                                template is made with
                                <i
                                    class="icon-heart text-danger"
                                    aria-hidden="true"
                                ></i>
                                by
                                <a
                                    href="https://colorlib.com/"
                                    target="_blank"
                                    rel="nofollow noopener"
                                    >Colorlib</a
                                >
                            </p>
                            <div class="d-block">
                                <a href="#" class="m-2"
                                    >Terms &amp; Conditions</a
                                >/
                                <a href="#" class="m-2">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: {},
            show: false
        };
    },
    methods: {
        onshow() {
            this.show = !this.show;
        }
    },
    created() {
        if (!User.loggedIn()) {
            console.log(true);
            this.$router.push({ name: "login" });
        }
        axios
            .get("/api/user")
            .then(res => (this.user = res.data))
            .catch(err => console.log(err));
    }
};
</script>

<style type="text/css"></style>
