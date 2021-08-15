# Xsolla Summer School Backend 2021

https://github.com/xsolla/xsolla-school-backend-2021/blob/main/README.md

Demo: https://feycot-xsolla-2021.herokuapp.com/


```
| GET|HEAD  | api/items             | items.index   |
| POST      | api/items             | items.store   |
| GET|HEAD  | api/items/create      | items.create  |
| GET|HEAD  | api/items/{item}      | items.show    |
| PUT|PATCH | api/items/{item}      | items.update  |
| DELETE    | api/items/{item}      | items.destroy |
| GET|HEAD  | api/items/{item}/edit | items.edit    |
```

Example
```
http https://feycot-xsolla-2021.herokuapp.com/api/items

{
    "data": [
        {
            "created_at": "2021-08-15T06:23:27.000000Z",
            "name": "facilis quasi aut",
            "price": 16954,
            "sku": "quia",
            "type": "virtual_good",
            "updated_at": "2021-08-15T06:23:27.000000Z"
        },
        {
            "created_at": "2021-08-15T06:23:27.000000Z",
            "name": "ut sed sit",
            "price": 87970,
            "sku": "sed",
            "type": "virtual_currency",
            "updated_at": "2021-08-15T06:23:27.000000Z"
        }
        // ...
    ],
    "links": {
        "first": "http://feycot-xsolla-2021.herokuapp.com/api/items?page=1",
        "last": "http://feycot-xsolla-2021.herokuapp.com/api/items?page=7",
        "next": "http://feycot-xsolla-2021.herokuapp.com/api/items?page=2",
        "prev": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 7,
        "links": [
            {
                "active": false,
                "label": "&laquo; Previous",
                "url": null
            },
            {
                "active": true,
                "label": "1",
                "url": "http://feycot-xsolla-2021.herokuapp.com/api/items?page=1"
            },
            {
                "active": false,
                "label": "2",
                "url": "http://feycot-xsolla-2021.herokuapp.com/api/items?page=2"
            }
        ],
        "path": "http://feycot-xsolla-2021.herokuapp.com/api/items",
        "per_page": 15,
        "to": 15,
        "total": 100
    }
}
```
