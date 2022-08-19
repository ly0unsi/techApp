<template>
    <div>
        <nav class="site-nav">
            <div class="container">
                <div class="site-navigation">
                    <div class="row">
                        <div class="col-md-2 text-center order-1 mb-3 mb-md-0">
                            <router-link to="/" class="logo m-0 text-uppercase">
                                Readose.com
                            </router-link>
                        </div>
                        <div class="col-md-4 order-3 order-md-1">
                            <form action="#" class="search-form">
                                <span class="icon-search2"></span>
                                <input
                                    type="search"
                                    class="form-control"
                                    style="border-radius:30px"
                                    v-model="searchTerm"
                                    placeholder="Search..."
                                />
                            </form>
                            <transition
                                name="custom-classes-transition"
                                enter-active-class="animate__animated animate__bounceIn"
                                leave-active-class="animate__animated animate__bounceOut"
                            >
                                <div
                                    v-if="searchTerm !== ''"
                                    class="bg-light col-3 py-2 px-2 mt-1 shadow-sm"
                                    style="height:auto;background:black;position:absolute;width:auto;z-index:3;border-radius:30px"
                                >
                                    <div v-if="searchedPosts.length > 0">
                                        <div
                                            :key="post.id"
                                            v-for="post in searchedPosts"
                                            class="d-flex mt-1"
                                            style="align-items: center;"
                                        >
                                            <img
                                                style="width: 37px;
                                            border-radius: 50%;
                                            border:1px solid #303030;
                                            height: 37px;
                                            object-fit: cover;"
                                                :src="post.photo"
                                                alt=""
                                            />
                                            <span
                                                style="margin-left:5px;color:#303030"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'post',
                                                        params: {
                                                            slug: post.slug
                                                        }
                                                    }"
                                                    >{{
                                                        post.title.slice(0, 40)
                                                    }}...</router-link
                                                >
                                            </span>
                                        </div>
                                    </div>
                                    <div v-else>
                                        NO user Found !!
                                    </div>
                                </div>
                            </transition>
                        </div>
                        <div
                            class="col-md-3 order-3 col-sm-12 shadow-sm"
                            style="border-radius:35px"
                            v-if="Object.keys(weather).length !== 0"
                        >
                            <img
                                :src="
                                    ' http://openweathermap.org/img/wn/' +
                                        weather.icon +
                                        '.png'
                                "
                                alt=""
                                width="38"
                                style="border-radius:50%"
                            />

                            <b class="text-dark">{{ weather.location }}</b>
                            <i class="fas fa-thermometer-half text-dark"></i>
                            <span class="text-dark"
                                >{{ weather.currentTemp }}°</span
                            >
                            -
                            <i class="fas fa-sun text-dark"></i>
                            <span class="text-dark">{{ weather.sunrise }}</span>
                        </div>
                        <div class="col-md-3 order-3" v-else>
                            <div
                                class="spinner-border spinner_add_post"
                                role="status"
                            >
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div
                            class="col-md-3 col-sm-12 text-end order-2 order-md-3 mb-3 mb-md-0"
                        >
                            <div class="d-flex">
                                <ul class="list-unstyled social me-auto col-10">
                                    <div style="float:left">
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-twitter"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-facebook"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-instagram"
                                                ></span
                                            ></a>
                                        </li>
                                    </div>

                                    <div
                                        style="float:right align-items: center;display: inline-flex;"
                                    >
                                        <li v-if="user.name" class="dropdown">
                                            <div
                                                alt=""
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <img
                                                    style="width: 30px;
                                                            border-radius: 50%;
                                                            border:1px solid #303030;
                                                            height: 30px;
                                                            object-fit: cover;cursor:pointer"
                                                    :src="user.profilePic"
                                                />
                                            </div>

                                            <div
                                                class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton"
                                            >
                                                <div
                                                    class="dropdown-item"
                                                    v-if="user.name"
                                                >
                                                    <router-link
                                                        style="padding:0"
                                                        :to="{
                                                            name: 'profile',
                                                            params: {
                                                                username:
                                                                    user.name
                                                            }
                                                        }"
                                                    >
                                                        {{ user.name }}
                                                    </router-link>
                                                </div>
                                                <div
                                                    class="dropdown-item"
                                                    v-if="user.name"
                                                >
                                                    <span
                                                        v-on:click="onShowModal"
                                                        style="cursor:pointer;color:#303030"
                                                        >Add a post</span
                                                    >
                                                </div>
                                                <div class="dropdown-item">
                                                    <router-link
                                                        style="padding:0"
                                                        :user="user"
                                                        to="/logout"
                                                        >Logout
                                                    </router-link>
                                                </div>
                                            </div>
                                        </li>
                                        <li v-if="user.name" class="dropdown">
                                            <div
                                                alt=""
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                style="font-size: 22px;cursor:pointer"
                                                @click="markAsRead(user.id)"
                                            >
                                                <i
                                                    class="far fa-bell text-dark ms-2"
                                                ></i>
                                                <span
                                                    class="bg-dark text-light rounded-circle position-absolute"
                                                    style="font-size: 11px;padding: 2px;width: 17px;height: 17px;text-align: center;right: -6px;"
                                                    v-if="unreadNots !== 0"
                                                    >{{ unreadNots }}</span
                                                >
                                            </div>

                                            <div
                                                class="dropdown-menu nots-dropdown"
                                                aria-labelledby="dropdownMenuButton"
                                                v-if="
                                                    Object.keys(nots).length !==
                                                        0
                                                "
                                            >
                                                <div
                                                    class="dropdown-item text-light"
                                                    v-for="not in nots.slice(
                                                        0,
                                                        4
                                                    )"
                                                    :key="not.id"
                                                >
                                                    <router-link
                                                        v-if="
                                                            not.type ==
                                                                'App\\Notifications\\postLiked'
                                                        "
                                                        style="padding:0"
                                                        class="text-light"
                                                        :to="{
                                                            name: 'post',
                                                            params: {
                                                                slug:
                                                                    not.data
                                                                        .post_slug
                                                            }
                                                        }"
                                                    >
                                                        <img
                                                            style="width: 24px;
                                                                    border-radius: 50%;
                                                                    border:1px solid #303030;
                                                                    height: 24px;
                                                                    object-fit: cover;"
                                                            :src="
                                                                not.data
                                                                    .user_pic
                                                            "
                                                            alt=""
                                                        />
                                                        <i
                                                            class="fas fa-heart"
                                                        ></i>

                                                        {{ not.data.user_name }}

                                                        <b>liked your post</b>
                                                    </router-link>

                                                    <div
                                                        v-else
                                                        style="cursor:pointer"
                                                    >
                                                        <img
                                                            style="width: 24px;
                                                                    border-radius: 50%;
                                                                    border:1px solid #303030;
                                                                    height: 24px;
                                                                    object-fit: cover;"
                                                            :src="
                                                                not.data
                                                                    .user_pic
                                                            "
                                                            alt=""
                                                        />
                                                        <i
                                                            class="fas fa-user-plus"
                                                        ></i>
                                                        {{ not.data.user_name }}
                                                        <b
                                                            >started following
                                                            you</b
                                                        >
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="dropdown-menu nots-dropdown"
                                                aria-labelledby="dropdownMenuButton"
                                                v-else
                                            >
                                                <div
                                                    class="dropdown-item text-light"
                                                >
                                                    No notifications at the
                                                    moment
                                                </div>
                                            </div>
                                        </li>
                                        <li v-if="!user.name">
                                            <router-link to="/login"
                                                >Login</router-link
                                            >
                                        </li>
                                    </div>
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
                        enter-active-class="animate__animated animate__slideInRight animate__faster"
                        leave-active-class=" animate__animated animate__slideOutRight animate__faster"
                    >
                        <ul
                            v-if="show"
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
                                <a href="#">Categories</a>
                                <ul class="dropdown">
                                    <li v-for="cat in categories" :key="cat.id">
                                        <router-link
                                            :to="{
                                                name: 'catposts',
                                                params: {
                                                    catName: cat.name
                                                }
                                            }"
                                        >
                                            {{ cat.name }}
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li v-if="user.name">
                                <router-link to="/createcat">
                                    Add category
                                </router-link>
                            </li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </transition>
                </div>
            </div>
        </nav>

        <create
            @closeModal="closeModal"
            :show-modal="showModal"
            :cats="categories"
        />

        <transition
            name="custom-classes-transition"
            enter-active-class="animate__animated animate__fadeInRight animate__fast"
        >
            <router-view :key="$route.fullPath"></router-view>
        </transition>
        <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>
<script>
import create from "./post/create.vue";
const API = "http://api.openweathermap.org/data/2.5/weather?units=metric";
const KEY = "&appid=" + process.env.MIX_OPEN_WEATHER_TOKEN;
// var config = {
//     method: "get",
//     url: "https://v3.football.api-sports.io/leagues",
//     params: {
//         name: "Botola Pro",
//         season: "2021"
//     },
//     headers: {
//         "x-rapidapi-key": "9f06cf75f48f32d5c71dfabf598f59b6",
//         "x-rapidapi-host": "v3.football.api-sports.io"
//     }
// };
export default {
    components: { create },
    mounted() {
        //  [App.vue specific] When App.vue is finish loading finish the progress bar
        this.$Progress.finish();
    },
    data() {
        return {
            weather: {
                currentTemp: "",
                windSpeed: "",
                maxTemp: "",
                sunrise: "",
                sunset: "",
                pressure: "",
                humidity: "",
                wind: "",
                overcast: "",
                icon: "",
                location: ""
            },
            user: {},
            categories: {},
            show: false,
            showModal: false,
            searchTerm: "",
            posts: [],
            nots: {},
            unreadNots: null,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    methods: {
        async getWeather(url) {
            const response = await axios.get(url);
            this.weather.currentTemp = response.data.main.temp;
            this.weather.windSpeed = response.data.wind.speed;
            this.weather.maxTemp = response.data.main.temp_max;
            this.weather.pressure = response.data.main.pressure;
            this.weather.humidity = response.data.main.humidity + "%";
            this.weather.wind = response.data.wind.speed + "m/s";
            this.weather.overcast = response.data.weather[0].description;
            this.weather.icon = response.data.weather[0].icon;
            this.weather.sunrise = new Date(response.data.sys.sunrise * 1000)
                .toLocaleTimeString("en-GB")
                .slice(0, 5);
            this.weather.sunset = new Date(response.data.sys.sunset * 1000)
                .toLocaleTimeString("en-GB")
                .slice(0, 5);
            this.weather.location =
                response.data.sys.country + "," + response.data.name;
        },
        geolocation() {
            navigator.geolocation.getCurrentPosition(
                this.buildUrl,
                this.geoError
            );
        },
        buildUrl(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            this.getWeather(API + "&lat=" + lat + "&lon=" + lon + KEY);
        },
        geoError(error) {
            this.getWeather(API + "&lat=0&lon=0" + KEY);
        },
        async markAsRead(id) {
            await axios.post("/api/markasread/" + id);
            Reload.$emit("profileChanged");
        },

        onShowModal() {
            this.showModal = !this.showModal;
        },
        exit() {
            this.user = null;
        },
        onshow() {
            this.show = !this.show;
        },
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.user = res.data;
            } catch (err) {
                console.log(err);
            }
        },
        async getNots() {
            if (Object.keys(this.user).length > 0) {
                const res = await axios.get("/api/getnots/");
                this.nots = res.data.nots;
                this.unreadNots = res.data.unreadNots;
            }
        },
        async getCategories() {
            const res = await axios.get("/api/categories/");
            this.categories = res.data;
        },
        async getPosts() {
            const res = await axios.get("/api/posts/");
            this.posts = res.data.trend;
        },
        closeModal() {
            this.showModal = false;
        },
        handleProgressBar() {
            //  [App.vue specific] When App.vue is first loaded start the progress bar
            this.$Progress.start();
            //  hook the progress bar to start before we move router-view
            this.$router.beforeEach((to, from, next) => {
                //  does the page we want to go to have a meta.progress object
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress;
                    // parse meta tags
                    this.$Progress.parseMeta(meta);
                }
                //  start the progress bar
                this.$Progress.start();
                //  continue to next page
                next();
            });
            //  hook the progress bar to finish after we've finished moving router-view
            this.$router.afterEach((to, from) => {
                //  finish the progress bar
                this.$Progress.finish();
            });
        }
    },

    mounted() {
        this.getNots();
        setInterval(() => {
            this.getNots();
        }, 3000);
    },
    computed: {
        searchedPosts() {
            return this.posts.filter(post => {
                return post.title.match(this.searchTerm.toUpperCase());
            });
        }
    },
    created() {
        this.getUser();
        Reload.$on("logout", () => {
            this.getUser();
            this.getNots();
        });
        Reload.$on("login", () => {
            this.getUser();
            this.getNots();
        });
        this.getCategories();
        this.getPosts();
        this.handleProgressBar();
        Reload.$on("profileChanged", () => {
            this.getUser();
            this.getNots();
        });
        this.getNots();
        this.geolocation();
        console.log(KEY);
        // axios(config)
        //     .then(function(response) {
        //         console.log(JSON.stringify(response.data));
        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });
    }
};
</script>

<style type="text/css"></style>
