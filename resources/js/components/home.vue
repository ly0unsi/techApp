<template>
    <div>
        <div class="section pt-5 pb-0">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading">
                            Trending
                        </h2>
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
                                <div v-for="post in posts" :key="post.id">
                                    <div class="post-entry d-lg-flex shadow">
                                        <div
                                            class="me-lg-5 thumbnail mb-4 mb-lg-0"
                                        >
                                            <a href="single.html">
                                                <img
                                                    :src="post.photo"
                                                    alt="Image"
                                                    class="img-fluid"
                                                />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category">{{
                                                    post.category.name
                                                }}</a
                                                >, &mdash;
                                                <span class="date">{{
                                                    post.created_at
                                                }}</span>
                                            </div>
                                            <h2 class="heading">
                                                <a href="single.html">{{
                                                    post.description
                                                }}</a>
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
                                                    <strong>{{
                                                        post.author.name
                                                    }}</strong>
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
                            class="btn btn-dark"
                            value="Subscribe"
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            posts: []
        };
    },
    methods: {
        getPosts() {
            axios.get("/api/posts/").then(res => (this.posts = res.data));
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style type="text/css"></style>
