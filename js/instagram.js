import { INSTAGRAM_TOKEN } from "../config.js";
const instaDom = document.querySelector('#instagram');
const loading = document.querySelector('.loading');
let output = '';
if (localStorage.getItem('insta')) {
    ;(async () => {
        let result = await JSON.parse(localStorage.getItem('insta'));
        result = result['data'];
        for (let key in result){
            if (!result.hasOwnProperty(key)) continue;
            let value = result[key];
            switch (value['media_type']) {
                case 'IMAGE':
                    output += `<a href="${value['permalink']}" target="_blank"><img data-lazy="${value['media_url']}" src="${value['media_url']}"  alt="ibrandafrica"/></a>`;
                    break;

                case 'CAROUSEL_ALBUM':
                    console.log('it has carousel albuma');
                    break;

                case 'VIDEO':
                    console.log('it has Video');
                    break;

                default:
                    console.log(value['media_type'])
            }
        }
        instaDom.innerHTML = output;
        if(output !== ''){
            stickImg();
            loading.hidden = true;
        }
    })();

} else {
    // GET UPDATED RESOURCE
    (async () => {
        await fetch('https://graph.instagram.com/me/media?fields=id,media_type,media_url,permalink&access_token='+INSTAGRAM_TOKEN)
            .then(res => res.json())
            .then(data =>  {
                localStorage.setItem('insta', JSON.stringify(data));
                ;(async () => {
                    let result = await JSON.parse(localStorage.getItem('insta'));
                    result = result['data'];
                    for (let key in result){
                        if (!result.hasOwnProperty(key)) continue;
                        let value = result[key];
                        switch (value['media_type']) {
                            case 'IMAGE':
                                output += `<a href="${value['permalink']}" target="_blank"><img data-lazy="${value['media_url']}" src="${value['media_url']}"  alt="ibrandafrica"/></a>`;
                                break;

                            case 'CAROUSEL_ALBUM':
                                console.log('it has carousel albuma');
                                break;

                            case 'VIDEO':
                                console.log('it has Video');
                                break;

                            default:
                                console.log(value['media_type'])
                        }
                    }
                    instaDom.innerHTML = output;
                    if(output !== ''){
                        stickImg();
                        loading.hidden = true;
                    }
                })();
            })
            .catch(err => {
                console.log('An error was found: ' + err)
            });
    })();

}

async function stickImg() {
    await $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 300,
        lazyLoad: 'ondemand',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrow: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrow: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
}

let dayInMilliseconds = 1000 * 60 * 60 * 24;

const deleteInst = new Promise( (resolve) => {
  let delRes = setInterval(function () {
      window.localStorage.removeItem('insta');
      resolve(delRes);
  }, dayInMilliseconds);
});


deleteInst.then(delRes => {
  clearInterval(delRes);
})
