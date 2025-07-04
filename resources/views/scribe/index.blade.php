<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Products API API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://products.coderans.site";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-product-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product-management">
                    <a href="#product-management">Product Management</a>
                </li>
                                    <ul id="tocify-subheader-product-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-management-GETapi-products">
                                <a href="#product-management-GETapi-products">List Products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-management-POSTapi-products">
                                <a href="#product-management-POSTapi-products">Create Product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-management-GETapi-products--id-">
                                <a href="#product-management-GETapi-products--id-">Get Product Details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-management-PUTapi-products--id-">
                                <a href="#product-management-PUTapi-products--id-">Update Product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-management-DELETEapi-products--id-">
                                <a href="#product-management-DELETEapi-products--id-">Delete Product</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 4, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://products.coderans.site</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="product-management">Product Management</h1>

    <p>APIs for creating, reading, updating, and deleting products.
This includes handling both simple and variable products.</p>

                                <h2 id="product-management-GETapi-products">List Products</h2>

<p>
</p>

<p>Retrieves a paginated list of products.
You can filter the results by name, type, and price range.</p>

<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://products.coderans.site/api/products?name=%22Awesome+T-Shirt%22&amp;type=variable&amp;min_price=10.5&amp;max_price=99.99&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://products.coderans.site/api/products"
);

const params = {
    "name": ""Awesome T-Shirt"",
    "type": "variable",
    "min_price": "10.5",
    "max_price": "99.99",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Products retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Quasi iusto est&quot;,
                &quot;slug&quot;: &quot;quasi-iusto-est&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee44?text=products+quis&quot;,
                &quot;description&quot;: &quot;Perferendis aut tenetur ut ea porro itaque veritatis. Eaque earum quas aliquid voluptas quo. Quaerat velit sit ut tempora.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 67.06,
                &quot;sku&quot;: &quot;SKU-8631&quot;,
                &quot;stock&quot;: 95,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Maxime fugiat officiis&quot;,
                &quot;slug&quot;: &quot;maxime-fugiat-officiis&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee11?text=products+et&quot;,
                &quot;description&quot;: &quot;Esse rem unde deleniti. Voluptas laudantium autem molestiae enim distinctio.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 24.09,
                &quot;sku&quot;: &quot;SKU-4065&quot;,
                &quot;stock&quot;: 23,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Accusantium id quia&quot;,
                &quot;slug&quot;: &quot;accusantium-id-quia&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbff?text=products+perspiciatis&quot;,
                &quot;description&quot;: &quot;Est non et consequatur aut pariatur quam nostrum. Ipsa possimus maiores ut occaecati. In suscipit architecto repudiandae nihil veniam ipsam eaque. Aut dolores eaque consequatur illo quam.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 78.92,
                &quot;sku&quot;: &quot;SKU-9634&quot;,
                &quot;stock&quot;: 55,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Doloribus maxime sint&quot;,
                &quot;slug&quot;: &quot;doloribus-maxime-sint&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aabb?text=products+rerum&quot;,
                &quot;description&quot;: &quot;Nobis labore veniam debitis pariatur autem quam eligendi. Voluptate perspiciatis placeat voluptatem ducimus numquam id. Quas quis neque sunt et harum aut. Impedit molestiae aliquid dolorem et illum.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 12.64,
                &quot;sku&quot;: &quot;SKU-5409&quot;,
                &quot;stock&quot;: 66,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Voluptatem reiciendis corporis&quot;,
                &quot;slug&quot;: &quot;voluptatem-reiciendis-corporis&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005566?text=products+velit&quot;,
                &quot;description&quot;: &quot;Facilis ipsa nisi earum aut. Et qui itaque explicabo minus quos. Amet est et qui omnis numquam facere et.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 10.65,
                &quot;sku&quot;: &quot;SKU-4354&quot;,
                &quot;stock&quot;: 7,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Recusandae ex ad&quot;,
                &quot;slug&quot;: &quot;recusandae-ex-ad&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd00?text=products+amet&quot;,
                &quot;description&quot;: &quot;A cumque corporis accusamus eos soluta qui tempora. Alias assumenda enim voluptates. Qui modi aperiam eaque culpa qui nihil.&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 85.18,
                &quot;sku&quot;: &quot;SKU-4068&quot;,
                &quot;stock&quot;: 98,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Ut dolores sed&quot;,
                &quot;slug&quot;: &quot;ut-dolores-sed&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ffee?text=products+iure&quot;,
                &quot;description&quot;: &quot;Totam autem quasi illo aliquid qui eveniet omnis. Aliquid qui ipsam consequatur tempora. Non sit et ut eligendi nobis necessitatibus aut odit.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 45.69,
                &quot;sku&quot;: &quot;SKU-2454&quot;,
                &quot;stock&quot;: 14,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Adipisci consequatur est&quot;,
                &quot;slug&quot;: &quot;adipisci-consequatur-est&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0033cc?text=products+omnis&quot;,
                &quot;description&quot;: &quot;Quisquam magni nihil magnam et. Amet nihil ducimus in vero illum eos. In quo eaque quia dolor sed suscipit commodi omnis. Omnis voluptates suscipit debitis.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 86,
                &quot;sku&quot;: &quot;SKU-6367&quot;,
                &quot;stock&quot;: 40,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;Commodi sapiente deleniti&quot;,
                &quot;slug&quot;: &quot;commodi-sapiente-deleniti&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/008899?text=products+ad&quot;,
                &quot;description&quot;: &quot;Fuga saepe delectus est. Repellat assumenda velit voluptatem sint. Nostrum exercitationem id quia tempore.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 88.3,
                &quot;sku&quot;: &quot;SKU-9696&quot;,
                &quot;stock&quot;: 18,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Suscipit nobis sequi&quot;,
                &quot;slug&quot;: &quot;suscipit-nobis-sequi&quot;,
                &quot;type&quot;: &quot;simple&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/008811?text=products+ipsum&quot;,
                &quot;description&quot;: &quot;Consequatur doloremque qui explicabo. Sit repellat et velit fuga voluptatibus. Sit maxime explicabo qui mollitia beatae sed et minus. Eveniet temporibus ex autem. Porro quasi quidem quam minima nostrum.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;price&quot;: 79.37,
                &quot;sku&quot;: &quot;SKU-4516&quot;,
                &quot;stock&quot;: 12,
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Rerum sed atque&quot;,
                &quot;slug&quot;: &quot;rerum-sed-atque&quot;,
                &quot;type&quot;: &quot;variable&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbdd?text=products+doloribus&quot;,
                &quot;description&quot;: &quot;Praesentium error et itaque voluptas. Cum expedita ut qui aut sequi. Qui qui nulla dolore et accusamus sint aut animi.&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_active&quot;: true,
                &quot;variations&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;sku&quot;: &quot;VAR-75152&quot;,
                        &quot;price&quot;: 24,
                        &quot;stock&quot;: 29,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0099aa?text=products+rerum&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;sku&quot;: &quot;VAR-23240&quot;,
                        &quot;price&quot;: 70,
                        &quot;stock&quot;: 29,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/001122?text=products+quisquam&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;sku&quot;: &quot;VAR-30462&quot;,
                        &quot;price&quot;: 23,
                        &quot;stock&quot;: 44,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd77?text=products+earum&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;sku&quot;: &quot;VAR-62389&quot;,
                        &quot;price&quot;: 91,
                        &quot;stock&quot;: 14,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0066dd?text=products+perspiciatis&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    }
                ],
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Vel assumenda voluptas&quot;,
                &quot;slug&quot;: &quot;vel-assumenda-voluptas&quot;,
                &quot;type&quot;: &quot;variable&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0033cc?text=products+assumenda&quot;,
                &quot;description&quot;: &quot;Iste sapiente totam iusto. Laboriosam et consequuntur architecto explicabo eos numquam. Alias accusamus voluptate dolores est quia fuga. Aut officia repellat optio modi ab. Quasi temporibus et fugiat repellendus rerum quis.&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_active&quot;: true,
                &quot;variations&quot;: [
                    {
                        &quot;id&quot;: 5,
                        &quot;sku&quot;: &quot;VAR-37157&quot;,
                        &quot;price&quot;: 45,
                        &quot;stock&quot;: 39,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0088aa?text=products+facere&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;value&quot;: &quot;Red&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;sku&quot;: &quot;VAR-75211&quot;,
                        &quot;price&quot;: 56,
                        &quot;stock&quot;: 30,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/004400?text=products+cum&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;value&quot;: &quot;Red&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;sku&quot;: &quot;VAR-40470&quot;,
                        &quot;price&quot;: 52,
                        &quot;stock&quot;: 14,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0077ee?text=products+officiis&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;sku&quot;: &quot;VAR-80363&quot;,
                        &quot;price&quot;: 60,
                        &quot;stock&quot;: 26,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/001111?text=products+rerum&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    }
                ],
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 13,
                &quot;name&quot;: &quot;Aut facilis est&quot;,
                &quot;slug&quot;: &quot;aut-facilis-est&quot;,
                &quot;type&quot;: &quot;variable&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005588?text=products+velit&quot;,
                &quot;description&quot;: &quot;Aut fugit voluptas excepturi cum tenetur. Ut omnis explicabo ut sint aliquam ad. Voluptatibus est dolorem vel necessitatibus id minima quaerat aperiam.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;variations&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;sku&quot;: &quot;VAR-67918&quot;,
                        &quot;price&quot;: 34,
                        &quot;stock&quot;: 40,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbee?text=products+recusandae&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 4,
                                &quot;value&quot;: &quot;Small&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 10,
                        &quot;sku&quot;: &quot;VAR-75635&quot;,
                        &quot;price&quot;: 78,
                        &quot;stock&quot;: 17,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd66?text=products+aut&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 11,
                        &quot;sku&quot;: &quot;VAR-33027&quot;,
                        &quot;price&quot;: 85,
                        &quot;stock&quot;: 43,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0011ff?text=products+quibusdam&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 4,
                                &quot;value&quot;: &quot;Small&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 12,
                        &quot;sku&quot;: &quot;VAR-13145&quot;,
                        &quot;price&quot;: 57,
                        &quot;stock&quot;: 35,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee88?text=products+aliquid&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    }
                ],
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Explicabo quas id&quot;,
                &quot;slug&quot;: &quot;explicabo-quas-id&quot;,
                &quot;type&quot;: &quot;variable&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/009955?text=products+distinctio&quot;,
                &quot;description&quot;: &quot;Omnis voluptates et qui vel cupiditate labore consequatur. Tempore dolorum et reiciendis aut commodi. Accusamus totam blanditiis maxime eos cum. Rem dolores nulla dolores.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;variations&quot;: [
                    {
                        &quot;id&quot;: 13,
                        &quot;sku&quot;: &quot;VAR-47162&quot;,
                        &quot;price&quot;: 66,
                        &quot;stock&quot;: 14,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/000055?text=products+in&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 14,
                        &quot;sku&quot;: &quot;VAR-74960&quot;,
                        &quot;price&quot;: 67,
                        &quot;stock&quot;: 49,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/001177?text=products+sunt&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 15,
                        &quot;sku&quot;: &quot;VAR-85745&quot;,
                        &quot;price&quot;: 98,
                        &quot;stock&quot;: 49,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0055cc?text=products+libero&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 16,
                        &quot;sku&quot;: &quot;VAR-94685&quot;,
                        &quot;price&quot;: 48,
                        &quot;stock&quot;: 27,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/006699?text=products+fuga&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;value&quot;: &quot;Blue&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    }
                ],
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            },
            {
                &quot;id&quot;: 15,
                &quot;name&quot;: &quot;Occaecati quas sapiente&quot;,
                &quot;slug&quot;: &quot;occaecati-quas-sapiente&quot;,
                &quot;type&quot;: &quot;variable&quot;,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/007733?text=products+id&quot;,
                &quot;description&quot;: &quot;Voluptas sit quaerat ratione. Nostrum aut sunt et et maiores consequuntur voluptatem. Temporibus est perspiciatis cum.&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_active&quot;: true,
                &quot;variations&quot;: [
                    {
                        &quot;id&quot;: 17,
                        &quot;sku&quot;: &quot;VAR-59639&quot;,
                        &quot;price&quot;: 75,
                        &quot;stock&quot;: 6,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0077cc?text=products+eius&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;value&quot;: &quot;Red&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 18,
                        &quot;sku&quot;: &quot;VAR-59216&quot;,
                        &quot;price&quot;: 89,
                        &quot;stock&quot;: 17,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd22?text=products+non&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;value&quot;: &quot;Red&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 19,
                        &quot;sku&quot;: &quot;VAR-19223&quot;,
                        &quot;price&quot;: 95,
                        &quot;stock&quot;: 35,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0022bb?text=products+quam&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 5,
                                &quot;value&quot;: &quot;Medium&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    },
                    {
                        &quot;id&quot;: 20,
                        &quot;sku&quot;: &quot;VAR-11257&quot;,
                        &quot;price&quot;: 28,
                        &quot;stock&quot;: 24,
                        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee99?text=products+animi&quot;,
                        &quot;attributes&quot;: [
                            {
                                &quot;id&quot;: 2,
                                &quot;value&quot;: &quot;Green&quot;,
                                &quot;attribute_name&quot;: &quot;Color&quot;
                            },
                            {
                                &quot;id&quot;: 6,
                                &quot;value&quot;: &quot;Large&quot;,
                                &quot;attribute_name&quot;: &quot;Size&quot;
                            }
                        ]
                    }
                ],
                &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
            }
        ],
        &quot;links&quot;: {
            &quot;first&quot;: &quot;http://127.0.0.1:8000/api/products?page=1&quot;,
            &quot;last&quot;: &quot;http://127.0.0.1:8000/api/products?page=1&quot;,
            &quot;prev&quot;: null,
            &quot;next&quot;: null
        },
        &quot;meta&quot;: {
            &quot;current_page&quot;: 1,
            &quot;from&quot;: 1,
            &quot;last_page&quot;: 1,
            &quot;links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;active&quot;: false
                }
            ],
            &quot;path&quot;: &quot;http://127.0.0.1:8000/api/products&quot;,
            &quot;per_page&quot;: 15,
            &quot;to&quot;: 15,
            &quot;total&quot;: 15
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-products"
               value=""Awesome T-Shirt""
               data-component="query">
    <br>
<p>Partial name to search for. Example: <code>"Awesome T-Shirt"</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-products"
               value="variable"
               data-component="query">
    <br>
<p>Filter by product type. Example: <code>variable</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>simple</code></li> <li><code>variable</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>min_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_price"                data-endpoint="GETapi-products"
               value="10.5"
               data-component="query">
    <br>
<p>Minimum price for the product or any of its variations. Example: <code>10.5</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>max_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_price"                data-endpoint="GETapi-products"
               value="99.99"
               data-component="query">
    <br>
<p>Maximum price for the product or any of its variations. Example: <code>99.99</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-products"
               value="20"
               data-component="query">
    <br>
<p>Number of items per page. Defaults to 15. Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="product-management-POSTapi-products">Create Product</h2>

<p>
</p>

<p>Creates a new product.
For a 'simple' product, provide <code>price</code>, <code>sku</code>, and <code>stock_quantity</code>.
For a 'variable' product, provide an array of <code>variations</code>.</p>

<span id="example-requests-POSTapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://products.coderans.site/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"\\\"Cool T-Shirt\\\"\",
    \"slug\": \"\\\"cool-t-shirt\\\"\",
    \"type\": \"\\\"variable\\\"\",
    \"description\": \"Consequatur quisquam recusandae asperiores accusamus nihil repellat.\",
    \"image\": \"culpa\",
    \"is_featured\": true,
    \"is_active\": true,
    \"price\": 49.99,
    \"sku\": \"\\\"TS-BLK-L\\\"\",
    \"stock_quantity\": 100,
    \"variations\": [
        \"culpa\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://products.coderans.site/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Cool T-Shirt\"",
    "slug": "\"cool-t-shirt\"",
    "type": "\"variable\"",
    "description": "Consequatur quisquam recusandae asperiores accusamus nihil repellat.",
    "image": "culpa",
    "is_featured": true,
    "is_active": true,
    "price": 49.99,
    "sku": "\"TS-BLK-L\"",
    "stock_quantity": 100,
    "variations": [
        "culpa"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Product details retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 13,
        &quot;name&quot;: &quot;Aut facilis est&quot;,
        &quot;slug&quot;: &quot;aut-facilis-est&quot;,
        &quot;type&quot;: &quot;variable&quot;,
        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005588?text=products+velit&quot;,
        &quot;description&quot;: &quot;Aut fugit voluptas excepturi cum tenetur. Ut omnis explicabo ut sint aliquam ad. Voluptatibus est dolorem vel necessitatibus id minima quaerat aperiam.&quot;,
        &quot;is_featured&quot;: false,
        &quot;is_active&quot;: true,
        &quot;variations&quot;: [
            {
                &quot;id&quot;: 9,
                &quot;sku&quot;: &quot;VAR-67918&quot;,
                &quot;price&quot;: 34,
                &quot;stock&quot;: 40,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbee?text=products+recusandae&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Green&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Small&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 10,
                &quot;sku&quot;: &quot;VAR-75635&quot;,
                &quot;price&quot;: 78,
                &quot;stock&quot;: 17,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd66?text=products+aut&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Green&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Large&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 11,
                &quot;sku&quot;: &quot;VAR-33027&quot;,
                &quot;price&quot;: 85,
                &quot;stock&quot;: 43,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0011ff?text=products+quibusdam&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Blue&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Small&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 12,
                &quot;sku&quot;: &quot;VAR-13145&quot;,
                &quot;price&quot;: 57,
                &quot;stock&quot;: 35,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee88?text=products+aliquid&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Blue&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Large&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            }
        ],
        &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-products"
               value=""Cool T-Shirt""
               data-component="body">
    <br>
<p>The name of the product. Example: <code>"Cool T-Shirt"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-products"
               value=""cool-t-shirt""
               data-component="body">
    <br>
<p>A unique slug for the product URL. Example: <code>"cool-t-shirt"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-products"
               value=""variable""
               data-component="body">
    <br>
<p>The type of product. Example: <code>"variable"</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>simple</code></li> <li><code>variable</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-products"
               value="Consequatur quisquam recusandae asperiores accusamus nihil repellat."
               data-component="body">
    <br>
<p>A description for the product. Example: <code>Consequatur quisquam recusandae asperiores accusamus nihil repellat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-products"
               value="culpa"
               data-component="body">
    <br>
<p>URL for the main product image. Example: <code>culpa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the product is featured. Defaults to false. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the product is active. Defaults to true. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-products"
               value="49.99"
               data-component="body">
    <br>
<p>The price of the product. Required if <code>type</code> is 'simple'. Example: <code>49.99</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="POSTapi-products"
               value=""TS-BLK-L""
               data-component="body">
    <br>
<p>The SKU of the product. Required if <code>type</code> is 'simple'. Example: <code>"TS-BLK-L"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="POSTapi-products"
               value="100"
               data-component="body">
    <br>
<p>The stock quantity. Required if <code>type</code> is 'simple'. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>variations</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The variations for the product. Required if <code>type</code> is 'variable'.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="variations.0.sku"                data-endpoint="POSTapi-products"
               value=""V-TS-BL-LG""
               data-component="body">
    <br>
<p>The unique SKU for this variation. Example: <code>"V-TS-BL-LG"</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.price"                data-endpoint="POSTapi-products"
               value="55"
               data-component="body">
    <br>
<p>The price for this variation. Example: <code>55</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.stock_quantity"                data-endpoint="POSTapi-products"
               value="50"
               data-component="body">
    <br>
<p>The stock quantity for this variation. Example: <code>50</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="variations.0.image"                data-endpoint="POSTapi-products"
               value="culpa"
               data-component="body">
    <br>
<p>An optional image URL for this specific variation. Example: <code>culpa</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.attributes[0]"                data-endpoint="POSTapi-products"
               data-component="body">
        <input type="number" style="display: none"
               name="variations.0.attributes[1]"                data-endpoint="POSTapi-products"
               data-component="body">
    <br>
<p>An array of <code>attribute_value_id</code>s that define this variation.</p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="product-management-GETapi-products--id-">Get Product Details</h2>

<p>
</p>

<p>Retrieves the details of a specific product, including its variations if applicable.</p>

<span id="example-requests-GETapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://products.coderans.site/api/products/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://products.coderans.site/api/products/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Product details retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 13,
        &quot;name&quot;: &quot;Aut facilis est&quot;,
        &quot;slug&quot;: &quot;aut-facilis-est&quot;,
        &quot;type&quot;: &quot;variable&quot;,
        &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005588?text=products+velit&quot;,
        &quot;description&quot;: &quot;Aut fugit voluptas excepturi cum tenetur. Ut omnis explicabo ut sint aliquam ad. Voluptatibus est dolorem vel necessitatibus id minima quaerat aperiam.&quot;,
        &quot;is_featured&quot;: false,
        &quot;is_active&quot;: true,
        &quot;variations&quot;: [
            {
                &quot;id&quot;: 9,
                &quot;sku&quot;: &quot;VAR-67918&quot;,
                &quot;price&quot;: 34,
                &quot;stock&quot;: 40,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbee?text=products+recusandae&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Green&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Small&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 10,
                &quot;sku&quot;: &quot;VAR-75635&quot;,
                &quot;price&quot;: 78,
                &quot;stock&quot;: 17,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd66?text=products+aut&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Green&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Large&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 11,
                &quot;sku&quot;: &quot;VAR-33027&quot;,
                &quot;price&quot;: 85,
                &quot;stock&quot;: 43,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0011ff?text=products+quibusdam&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Blue&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Small&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 12,
                &quot;sku&quot;: &quot;VAR-13145&quot;,
                &quot;price&quot;: 57,
                &quot;stock&quot;: 35,
                &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee88?text=products+aliquid&quot;,
                &quot;attributes&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Blue&quot;,
                        &quot;attribute_name&quot;: &quot;Color&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Large&quot;,
                        &quot;attribute_name&quot;: &quot;Size&quot;
                    }
                ]
            }
        ],
        &quot;created_at&quot;: &quot;2025-07-03 16:35:07&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--id-" data-method="GET"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--id-"
                    onclick="tryItOut('GETapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--id-"
                    onclick="cancelTryOut('GETapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-products--id-"
               value="12"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>12</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="GETapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="product-management-PUTapi-products--id-">Update Product</h2>

<p>
</p>

<p>Updates an existing product's details. When updating a variable product, you can add,
update, or remove variations. To update a variation, include its <code>id</code>. To add a new one, omit the <code>id</code>.
Any existing variations not included in the request will be deleted.</p>

<span id="example-requests-PUTapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://products.coderans.site/api/products/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"pasyzwszwtxpeqq\",
    \"slug\": \"ikymwkiinfowtzm\",
    \"type\": \"simple\",
    \"description\": \"Consequatur quisquam recusandae asperiores accusamus nihil repellat.\",
    \"image\": \"wtxpeqqikymwkii\",
    \"is_featured\": true,
    \"is_active\": true,
    \"price\": 47,
    \"sku\": \"fowtzmixkolowyu\",
    \"stock_quantity\": 20,
    \"variations\": [
        {
            \"id\": 10,
            \"sku\": \"asyzwszwtxpeqqi\",
            \"price\": 36,
            \"stock_quantity\": 85,
            \"attributes\": [
                12
            ]
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://products.coderans.site/api/products/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "pasyzwszwtxpeqq",
    "slug": "ikymwkiinfowtzm",
    "type": "simple",
    "description": "Consequatur quisquam recusandae asperiores accusamus nihil repellat.",
    "image": "wtxpeqqikymwkii",
    "is_featured": true,
    "is_active": true,
    "price": 47,
    "sku": "fowtzmixkolowyu",
    "stock_quantity": 20,
    "variations": [
        {
            "id": 10,
            "sku": "asyzwszwtxpeqqi",
            "price": 36,
            "stock_quantity": 85,
            "attributes": [
                12
            ]
        }
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--id-">
</span>
<span id="execution-results-PUTapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-products--id-" data-method="PUT"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--id-"
                    onclick="tryItOut('PUTapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--id-"
                    onclick="cancelTryOut('PUTapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-products--id-"
               value="12"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>12</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="PUTapi-products--id-"
               value="2"
               data-component="url">
    <br>
<p>The ID of the product to update. Example: <code>2</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-products--id-"
               value="pasyzwszwtxpeqq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>pasyzwszwtxpeqq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-products--id-"
               value="ikymwkiinfowtzm"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ikymwkiinfowtzm</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTapi-products--id-"
               value="simple"
               data-component="body">
    <br>
<p>Example: <code>simple</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>simple</code></li> <li><code>variable</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-products--id-"
               value="Consequatur quisquam recusandae asperiores accusamus nihil repellat."
               data-component="body">
    <br>
<p>Example: <code>Consequatur quisquam recusandae asperiores accusamus nihil repellat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-products--id-"
               value="wtxpeqqikymwkii"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>wtxpeqqikymwkii</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-products--id-" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="PUTapi-products--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-products--id-" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="PUTapi-products--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-products--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-products--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-products--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-products--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-products--id-"
               value="47"
               data-component="body">
    <br>
<p>This field is required when <code>type</code> is <code>simple</code>. Must be at least 0. Example: <code>47</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="PUTapi-products--id-"
               value="fowtzmixkolowyu"
               data-component="body">
    <br>
<p>This field is required when <code>type</code> is <code>simple</code>. Must not be greater than 255 characters. Example: <code>fowtzmixkolowyu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="PUTapi-products--id-"
               value="20"
               data-component="body">
    <br>
<p>This field is required when <code>type</code> is <code>simple</code>. Must be at least 0. Example: <code>20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>variations</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>This field is required when <code>type</code> is <code>variable</code>.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.id"                data-endpoint="PUTapi-products--id-"
               value="10"
               data-component="body">
    <br>
<p>The ID of an existing variation to update. Omit to create a new one. Example: <code>10</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="variations.0.sku"                data-endpoint="PUTapi-products--id-"
               value="asyzwszwtxpeqqi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>asyzwszwtxpeqqi</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.price"                data-endpoint="PUTapi-products--id-"
               value="36"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>36</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.stock_quantity"                data-endpoint="PUTapi-products--id-"
               value="85"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>85</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="variations.0.attributes[0]"                data-endpoint="PUTapi-products--id-"
               data-component="body">
        <input type="number" style="display: none"
               name="variations.0.attributes[1]"                data-endpoint="PUTapi-products--id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the attribute_values table.</p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="product-management-DELETEapi-products--id-">Delete Product</h2>

<p>
</p>

<p>Deletes a product and all of its associated variations permanently.</p>

<span id="example-requests-DELETEapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://products.coderans.site/api/products/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://products.coderans.site/api/products/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Product deleted successfully.&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;The requested product was not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-products--id-" data-method="DELETE"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--id-"
                    onclick="tryItOut('DELETEapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--id-"
                    onclick="cancelTryOut('DELETEapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-products--id-"
               value="12"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>12</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="DELETEapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product to delete. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
