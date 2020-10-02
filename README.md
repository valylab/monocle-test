# Monocle developer test

Convert the creative you can find in the design folder to a fully functional website. Make sure that you follow the design and grid as closely as possible.

## Requirements

* Ensure that your mark-up is W3C compliant
* Ensure that you use either HTML5 or XHTML Strict Doctype and CSS3
* Use the fonts and images provided
* Make the page responsive, paying attention to key breakpoints and adapt the design accordingly
* Use jQuery or standard javascript for the form validation
* The Comment form should include a client-side validation and display stored comments from previous submissions
* The page should function and follow the creative in the following browsers:
    * Firefox 62+
    * Chrome 66+
    * Safari 10+
    * IE 11+
    * iOS latest
    * Android latest

## Project Setup

```
git clone git@github.com:valylab/monocle-test.git

cd monocle-test

npm install

gulp build
```
Create database `monocle-test-db` and import the file `monocle-test-db.sql`

Update the credential for your database if necessary