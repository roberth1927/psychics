@extends('layouts.app')
@section('metas')
@parent
<link rel="canonical" href="https://www.psychics1on1.com">
<meta name="keywords" content="Psychic blog">
<meta name="description"
    content="Learn about spirituality, tarot, and how to improve your wellbeing from our psychic blog. We always have something new to share from the world of psychics.">
@endsection
@section('title', 'Psychic Blog & Articles | Free $5 Credit | Psychics1on1')
@section('content')

{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}
<v-flex class="d-none d-md-flex">
    <v-img src="/images/blog_images/blog_header2.png" aspect-ratio="1"
        max-height="180" class="align-center justify-center">
        <div class="home_search">
        @if(isset($blogetc_category) && $blogetc_category)
        {{-- <h2 class='text-center primary--text blog_category' style="">{{$blogetc_category->category_name}}</h2> --}}
        <h1>
            Psychic Blog
        </h1>
        <h3>
            Insightful {{$blogetc_category->category_name}} Articles</h3>
        @else
        <h1>
            Psychic Blog</h1>
            <h3>
                Read the Latest Psychic Articles, Secret Knowledge, Signs & Practical Tips
            </h3>
        @endif
        {{--<h2
                    class="subtitle-1 text-center white--text"
                    style="font-size:25px !important"
            >Immediate Advice You Can Trust From Your Personal Spiritual Advisor</h2>--}}
        </div>
    </v-img>
</v-flex>
<v-flex class="d-flex d-md-none">
    <v-img src="/images/blog_images/blog_header_mobile.png" aspect-ratio="1"
        max-height="153" class="align-center justify-center">
        <div class="home_search">
        @if(isset($blogetc_category) && $blogetc_category)
        {{-- <h2 class='text-center primary--text blog_category' style="">{{$blogetc_category->category_name}}</h2> --}}
        <h1 class="text-center white--text" style="margin-top: 45px; color: #8EBEF8;font:normal normal 900 40px/40px Montserrat">
            Psychic Blog</h1>
        <h1 class="text-center mt-4 white--text" style="font-size: 12px; font-weight: 400; color: #8EBEF8">
            Insightful {{$blogetc_category->category_name}} Articles</h1>
        @else
        <h1 class="text-center white--text" style="
        margin-top: 45px;
        text-align: center;
        font:normal normal 900 40px/40px Montserrat;
        letter-spacing: 0.36px;
        color: #FFFFFF;
        opacity: 1;">
            Psychic Blog</h1>
        {{-- <h1 class="text-center mt-4 white--text" style="font-size: 12px; font-weight: 400">
            Read the Latest Psychic Articles, Secret Knowledge, Signs & Practical Tips</h1> --}}
            <div class="text-center mt-4">
            <h3 style="
                text-align: center;
                font: normal normal medium 12px/22px Montserrat;
                letter-spacing: 0px;
                color: #FFFFFF;
                text-transform: capitalize;
                opacity: 1;
            ">
                Read the Latest Psychic Articles, Secret Knowledge, Signs & Practical Tips
            </h3>
        </div>
        @endif
        </div>
        {{--<h2
                    class="subtitle-1 text-center white--text"
                    style="font-size:25px !important"
            >Immediate Advice You Can Trust From Your Personal Spiritual Advisor</h2>--}}
    </v-img>
</v-flex>
<div  style="background-color: white; position: relative;">

        <div class="container-3 positionParagraph-1">
            <div id="styleparagraphContainer">
                <p id="styleparagraph" style="">
                      Enjoy our holistic blog that covers a variety of exciting topics, even if you’re not a Psychics1on1 client yet. Once you find the sage wisdom that resonates with you most, take advantage of the positive impact it can have in your life going forward. Keep checking back for the latest posts on monthly horoscopes, techniques, and tell-alls about life’s greatest mysteries and how to navigate them. 
                 </p>
             </div>
        </div>
        <div class="container">
        <div class='row'>
            <div class='col-sm-12 blogetc_container px-0'>
                @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
                <div class="text-center">
                    <p class='mb-1'>You are logged in as a blog admin user.
                        <br>
    
                        <a href='{{route("blogetc.admin.index")}}' class='btn border  btn-outline-primary btn-sm '>
    
                            <i class="fa fa-cogs" aria-hidden="true"></i>
    
                            Go To Blog Admin Panel</a>
    
    
                    </p>
                </div>
                @endif
                @if(isset($blogetc_category) && $blogetc_category)
                {{-- <div class='mt-3 mx-5'>
                    <a href="/blog">
                        <img style="-webkit-transform:rotate(180deg);
                    -moz-transform: rotate(180deg);
                    -ms-transform: rotate(180deg);
                    -o-transform: rotate(180deg);
                    transform: rotate(180deg);" src="{{config('app.url')}}/images/blog_images/all_articles.png" width="30" />
                        <span style="font-size: 14px; color: #8EBEF8; font-weight: 600">All Articles</span>
                    </a>
                </div> --}}
                @endif
                {{-- <div class='text-right mt-3 mx-5'>
                    
                    
                </div> --}}
    
                @if(empty($posts))
                <div class='alert alert-danger'>No posts</div>
                @else
                <div class="row">
                    <div class="col-12 col-md-6 styleAllArticles" 
                         style="display:flex;justify-content:start;align-items: center;">
                        <a href="/blog" >
                            <img class="styelIcon" src="{{config('app.url')}}/images/icons/articles-icon-Inactive@2x.png"/>
                            <span class="styleTitleArticles ml-2">All Articles</span>
                          </a>
                        
                    </div>
                </div>
                <div class="row marginImg">
                    @foreach ($posts as $post)
                    @include("blogetc::partials.index_loop")
                    @endforeach
                </div>
             
                @endif
                
                <div class='row postionPagination'>
                  <div class='text-center col-sm-4 mx-auto asd'>
                      {{$posts->appends( [] )->links()}}
                  </div>
              </div>
    
                {{-- @include("blogetc::sitewide.search_form")--}}
    
            </div>
        </div>
    </div>
    <div class="container-4 positionAllPost">
     <div class="styleAllPostContainer">
        <h3 class="styleAllPost"    >
        All Posts
        </h3>
        <span id="styleparagraph">
            There is always something new to learn about the universe and its messages to us. Use this blog as your guide. We use this blog to discuss everything that pertains to psychics, mediums, and clairvoyants. Not only does it give you more insight on how to approach life experiences, but this blog gives our tuned-in psychics the opportunity to shed light on the world around us.<br><br>

            Browse through all our posts and check back for new ones that can help you improve your outlook on life. With so many categories to choose from, like tarot, astrology, and overall wellbeing, the gained clarity on life never has to slow down. If there’s a particular subject that resonates with you or leaves you with more questions, consider booking an appointment with one of our psychics, mediums or clairvoyants to talk beyond the blog. 
        </span>
        </div>
    </div>
</div>
@endsection

<style>
.postionPagination{
    position: relative;
    top: -272px;
}
.positionParagraph-1{
    position: absolute;
    background: 0% 0% no-repeat padding-box padding-box rgb(240, 240, 247);
    opacity: 1;
    top: 0px;
    width: 100%;
}
.positionAllPost{
    position: absolute;
    background: 0% 0% no-repeat padding-box padding-box rgb(240, 240, 247);
    opacity: 1;
    bottom: 0px;
    width: 100%;
}
.styleAllPost{
    font-family: 'Montserrat' !important;
        font-weight: 600 !important;
        font-stretch: normal !important;
        font-style: normal !important;
        line-height: 1.22 !important;
        letter-spacing: normal!important;
        color: #1F1E34 !important;

}
.styleAllPostContainer{
    margin: auto;
    margin-bottom: 28px !important;
    width: 1026px;
    padding-top: 33px;
    padding-bottom: 8px;

}
#styleparagraphContainer{
    text-align: center;
    width: 1050px;
    margin: auto;
}
#styleparagraph{
    font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-medium) var(--unnamed-font-size-14)/var(--unnamed-line-spacing-26) var(--unnamed-font-family-montserrat) !important;
    font-size: 14px !important;
    font-stretch: normal !important;
    font-style: normal !important;
    line-height: 1.5 !important;
    letter-spacing: 0px !important;
    color: #43425D !important;
    margin-top: 20px !important;
}
.post-title{
            font-size: 18px
        }
.v-application .list p{
        margin-bottom: 0px !important;
    }
    .container-blog {
        width: 100%;
        padding: 12px;
        margin-right: auto;
        margin-left: auto;
    }

    .image_container {
        height: 320px;
        width: 100%;
        max-width: 500px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .post-list-text{
        width: 100%;
        max-width: 500px; 
    }

    .blog_title {
        font-size: 60px;
    }

    .blog_category {
        font-size: 32px;
    }

    .article_blog {
        margin: 50px auto;
    }

    .blog_article_title {
        font-size: 24px !important;
    }
    .marginImg{
            margin-right: 160px !important;
            margin-left: 160px !important;
            margin-bottom: 300px;
    }
    .styleTitleArticles{
                  font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-600) var(--unnamed-font-size-14)/var(--unnamed-line-spacing-18) var(--unnamed-font-family-montserrat);
                  color: var(--unnamed-color-8ebef8);
                  text-align: left;
                  font: normal normal 600 14px/18px Montserrat;
                  letter-spacing: 0.28px;
                  color: #8EBEF8;
                  opacity: 1;
    }
    .styelIcon{
        width: 40px;
        height: 40px;
    }
    .styleAllArticles{
            margin-left: 166px;
            margin-top: 109px;
    }
   
    @media (min-width: 1441px) and (max-width: 1903px) {
        .marginImg{
            margin-right: 60px !important;
            margin-left: 60px !important;
        }
        .styleAllArticles{
            margin-left: 66px;
        } 
    }
 
 

    @media (max-width: 1440px) {
        .marginImg{
            margin-right: 60px !important;
            margin-left: 60px !important;
        }
        .styleAllArticles{
            margin-left: 66px;
        }
    }
    .image_container {
            width:  500px;
    }

    @media (max-width: 1263px) {
        .marginImg{
            margin-right: -80px !important;
            margin-left: -80px !important;
        }
        .styleAllArticles{
            margin-left: -75px;
        }   
    }
   
    @media (max-width: 1024px) {
        .marginImg{
            margin-right: -35px !important;
            margin-left: -35px !important;
        }
        .image_container {
            width: 457px !important;
        }
        .styleAllArticles{
            margin-left: -27px;
        }

    }
    @media (max-width: 960px) {
        .styleAllArticles{
            margin-left: 100px;
        }

    }
    @media (max-width: 500px) {
        .image_container {
            height: 180px;
            width:  100% !important;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #styleparagraphContainer{
            width: 360px;

        }  
        .styleAllPostContainer{
            width: 310px;

        }
        .marginImg{
            margin-right: 0px !important;
            margin-left: 0px !important;
            padding-bottom: 270px;

        }

        .blog_article_title {
            font-size: 20px !important;
        }

        .article_blog {
            margin: 10px auto;
        }

        .blog_title {
            font-size: 24px;
        }

        .blog_category {
            font-size: 14px;
        }

        .post-title{
            font-size: 15px
        }
        .styleAllArticles{
            margin-left: 25px !important;
            margin-top: 241px;
        }
        .postionPagination{
            position: relative;
            top: -548px;
        }
        .styelIcon{
        width: 30px;
        height: 30px;
    }

    }


    @media (min-width: 901px) {
        .container-blog {
            max-width: 900px !important;
        }
        
    }
</style>