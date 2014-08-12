# Magento - Open Gallery Extension

OpenSource Image and Video Gallery Extension for Magento Commerce

### Features:
* Image galleries
* Video galleries
* Mixed (Images and Video) galleries
* ColorBox on frontend with ajax loading

### Video Item Features:
* Youtube support
* Embed code support
* Upload file support

Frontend Demo: http://gallery.openmagento.com/gallery

### Usage

Gallery home page
```html
http://sitename.com/gallery
```

### Cms Block/Page Usage
For add gallery to cms page or static block, use placeholders:

List of all categories
```html
{{block type="open_gallery/home"}}
```

List category items
```html
{{block type="open_gallery/category_view" category_id=1}}
```

