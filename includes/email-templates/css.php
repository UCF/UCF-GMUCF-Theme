<style type="text/css">
  @font-face {
    font-family: 'montserratbold';
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.eot');
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.eot?#iefix') format('embedded-opentype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.woff2') format('woff2'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.woff') format('woff'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.ttf') format('truetype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.svg#montserratbold') format('svg');
    font-weight: normal;
    font-style: normal;
    letter-spacing: 1px;
  }

  @font-face {
    font-family: 'montserratlight';
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.eot');
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.eot?#iefix') format('embedded-opentype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.woff2') format('woff2'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.woff') format('woff'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.ttf') format('truetype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.svg#montserratlight') format('svg');
    font-weight: normal;
    font-style: normal;
    letter-spacing: 1px;
  }

  @font-face {
    font-family: 'montserratsemi_bold';
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.eot');
    src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.eot?#iefix') format('embedded-opentype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.woff2') format('woff2'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.woff') format('woff'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.ttf') format('truetype'),
      url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.svg#montserratsemi_bold') format('svg');
    font-weight: normal;
    font-style: normal;
    letter-spacing: 1px;
  }

  /* CSS Resets */

  .ReadMsgBody {
    width: 100%;
    background-color: #ffffff;
  }

  .ExternalClass {
    width: 100%;
    background-color: #ffffff;
  }

  .ExternalClass,
  .ExternalClass p,
  .ExternalClass span,
  .ExternalClass font,
  .ExternalClass td,
  .ExternalClass div {
    line-height: 100%;
  }

  body {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
  }

  body {
    margin: 0;
    padding: 0;
  }

  table {
    border-spacing: 0;
  }

  table td {
    border-collapse: collapse;
  }

  * {
    zoom: 1;
  }

  a {
    color: #006699;
  }

  div,
  p,
  a,
  li,
  td {
    -webkit-text-size-adjust: none;
  }

  /* ios likes to enforce a minimum font size of 13px; kill it with this */

  /**
      * Outlook 2007-2013 hates inline webfont declarations and won't use fallback fonts,
      * so use class-based overrides instead
      **/

  *[class="montserratlight"] {
    font-family: 'montserratlight', Helvetica, Arial, sans-serif !important;
  }

  *[class="montserratsemibold"] {
    font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
  }

  *[class="montserratbold"] {
    font-family: 'montserratbold', Helvetica, Arial, sans-serif !important;
    font-weight: normal !important;
  }

  td[class="givebtn"] {
    font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
  }

  td[class="givedesc"] {
    font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
  }

  /*
      * General styles for the editor to maintain consistency btwn it and
      * generated email markup
      */

  p {
    display: block;
    width: 100%;
    padding-bottom: 20px;
  }

  p span {
    line-height: inherit;
  }

  @media all and (max-width: 640px) {

    /* The outermost wrapper table */
    table.t640 {
      width: 100% !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
      margin: 0 !important;
    }

    /* The firstmost inner tables, which should be padded at mobile sizes */
    table.t564 {
      width: 100% !important;
      padding-left: 15px;
      padding-right: 15px;
      padding-top: 15px !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
      margin: 0 !important;
    }

    /* Generic class for a table column that should collapse to 100% width at mobile sizes (with bottom padding) */
    td.ccollapse100pb {
      display: block !important;
      overflow: hidden;
      width: 100% !important;
      float: left;
      clear: both;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-bottom: 20px !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
    }

    /* Generic class for a table column that should collapse to 100% width at mobile sizes (with top padding) */
    td.ccollapse100pt {
      display: block !important;
      overflow: hidden;
      width: 100% !important;
      float: left;
      clear: both;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-top: 20px !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
    }

    /* Generic class for a table column that should collapse to 50% width at mobile sizes (with bottom padding) */
    td.ccollapse50pb {
      display: block !important;
      overflow: hidden;
      width: 50% !important;
      float: left;
      clear: both;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-bottom: 20px !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
    }

    /* Generic class for a table column that should collapse to 100% width at mobile sizes */
    td.ccollapse100 {
      display: block !important;
      overflow: hidden;
      clear: both;
      width: 100% !important;
      float: left !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
    }

    /* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
    table.tcollapse100 {
      width: 100% !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      border-left: 0px solid transparent !important;
      border-right: 0px solid transparent !important;
    }

    /* Forces an image to fit 100% width of its parent */
    img.responsiveimg {
      max-width: none !important;
      width: 100% !important;
    }

    img.responsiveimgmw {
      max-width: 100% !important;
    }

    /* remove padding since 100% width */
    img.responsiveimgpb {
      width: 100% !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-bottom: 20px !important;
    }

    td[class="givebtn"] {
      font-size: 16px !important;
      padding: 10px !important;
    }

    td[class="givedesc"] {
      font-size: 16px !important;
    }
  }
</style>
