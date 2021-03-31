<?php
/*----------------------------------------
    会社情報
------------------------------------------*/
$HTML['schemalist']['office'] = <<< HTML
<script type="application/ld+json">
{
    "@context" : "https://schema.org",
    "@type" : "Organization",
    "name" : "{$HTML['shop']['name']}",
    "founder":"大宮 寛久",
    "foundingDate":"2020-01",
    "description" : "{$HTML['pageDescription']['top']}",
    "url" : "{$HTML['shop']['url']}",
    "logo": "{$img}favicon/512.png",
    "telephone" : "+81-{$HTML['shop']['tel']}",
    "address": {
        "@type": "PostalAddress",
        "postalCode": "{$HTML['shop']['postcode']}",
        "addressRegion": "{$HTML['shop']['adress'][1]}",
        "addressLocality": "{$HTML['shop']['adress'][2]}",
        "streetAddress": "{$HTML['shop']['adress'][3]}",
        "addressCountry": "JP"
    },
    "contactPoint" :[
        { "@type" : "ContactPoint",
        "telephone" : "+81-{$HTML['shop']['tel']}",
        "contactType" : "customer service"
        }
        ]},
"sameAs":[
"https://twitter.com/OhmiyaLab",
"https://www.instagram.com/ohmiyalab/",
"https://www.kanazawa-u.ac.jp/"
]
}
</script>
HTML;

?>
