<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of HtmlHelper.php (KatiePHP) /system/helpers
/* * ************************************************************************ */

/*
 * function doctype
 * creates the doctype of the page
 *  parameters:
 *      @errorMessage : string expected (optional)
 */

if (!function_exists('doctype')) {

    function doctype($doctype = 'html5') {
        $doctypesArray = array(
            'xhtml11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
            'xhtml1-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
            'xhtml1-trans' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
            'xhtml1-frame' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
            'html5' => '<!DOCTYPE html>',
            'html4-strict' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
            'html4-trans' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
            'html4-frame' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">'
        );

        if (isset($doctypesArray[$doctype])) {
            return $doctypesArray[$doctype];
        } else {
            return false;
        }
    }

}
/* * ************************************************************************ */

/*
 * function meta
 * creates meta data of the page
 *  parameters:
 *      @metaName : string or array expected (optional)
 *      @metaContent : string  expected (optional)
 *      @metaType : string  expected (optional)
 *      @newline : string  expected (optional)
 */

if (!function_exists('meta')) {

    function meta($metaName = '', $metaContent = '', $metaType = 'name', $newline = "\n") {
        if (!is_array($metaName)) {
            $metaName = array(array('name' => $metaName, 'content' => $metaContent, 'type' => $metaType, 'newline' => $newline));
        } else {
            if (isset($metaName['name'])) {
                $metaName = array($metaName);
            }
        }

        $returnString = '';
        foreach ($metaName as $meta) {
            $metaType = (!isset($meta['type']) OR $meta['type'] == 'name') ? 'name' : 'charset';
            $metaName = (!isset($meta['name'])) ? '' : $meta['name'];
            $metaContent = (!isset($meta['content'])) ? '' : $meta['content'];
            $newline = (!isset($meta['newline'])) ? "\n" : $meta['newline'];
            if ($metaType == 'charset') {
                $returnString .= '<meta ' . $metaType . '="' . $metaContent . '">' . $newline;
            } else {
                $returnString .= '<meta ' . $metaType . '="' . $metaName . '" content="' . $metaContent . '">' . $newline;
            }
        }

        return $returnString;
    }

}
/* * ************************************************************************ */

/*
 * function linkTag
 * creates link tags of the page
 *  parameters:
 *      @href : string expected (optional)
 *      @rel : string  expected (optional)
 *      @type : string  expected (optional)
 *      @title : string  expected (optional)
 *      @media : string  expected (optional)
 */


if (!function_exists('linkTag')) {

    function linkTag($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '') {
        $KT = new KT_Config;
        $link = '<link ';
        if (is_array($href)) {
            foreach ($href as $k => $v) {
                if ($k == 'href' AND strpos($v, '://') === FALSE) {
                    $link .= 'href="' . $KT->siteURL($v) . '" ';
                } else {
                    $link .= "$k=\"$v\" ";
                }
            }
            $link .= "/>";
        } else {
            if (strpos($href, '://') !== FALSE) {
                $link .= 'href="' . $href . '" ';
            } else {
                $link .= 'href="' . $KT->siteURL($href) . '" ';
            }

            $link .= 'rel="' . $rel . '" ';

            if ($type != '') {
                $link .= ' type="' . $type . '" ';
            }
            if ($media != '') {
                $link .= 'media="' . $media . '" ';
            }

            if ($title != '') {
                $link .= 'title="' . $title . '" ';
            }

            $link .= '>';
        }


        return $link;
    }

}
/* * ************************************************************************ */

/*
 * function scriptTag
 * creates meta data of the page
 *  parameters:
 *      @src : string expected (optional)
 */

if (!function_exists('scriptTag')) {

    function scriptTag($src = '') {
        $KT = new KT_Config;
        $script = '<script ';
        if (strpos($src, '://') !== FALSE) {
            $script .= 'src="' . $src . '"';
        } else {
            $script .= 'src="' . $KT->siteURL($src) . '"';
        }
        $script .='></script>';
        return $script;
    }

}
/* * ************************************************************************ */

/*
 * function img
 * creates image tag
 *  parameters:
 *      @src : string expected (optional)
 */

if (!function_exists('img')) {

    function img($src = '') {
        if (!is_array($src)) {
            $src = array('src' => $src);
        }
        // validator hack
        if (!isset($src['alt'])) {
            $src['alt'] = '';
        }
        $imageString = '<img';
        foreach ($src as $k => $v) {
            if ($k == 'src' AND strpos($v, '://') === FALSE) {
                $KT = new KT_Config;
                $imageString .= ' src="' . $KT->siteURL($v) . '"';
            } else {
                $imageString .= " $k=\"$v\"";
            }
        }
        $imageString .= '>';
        return $imageString;
    }

}
/* * ************************************************************************ */

/*
 * function anchor
 * creates anchor tag
 *  parameters:
 *      @uri : string expected (optional)
 *      @title : string expected (optional)
 *      @attributes : string expected (optional)
 */

if (!function_exists('anchor')) {

    function anchor($uri = '', $title = '', $attributes = '') {
        $KT = new KT_Config;
        $title = (string) $title;

        if (!is_array($uri)) {
            $siteURL = (!preg_match('!^\w+://! i', $uri)) ? $KT->siteURL($uri) : $uri;
        } else {
            $siteURL = $KT->siteURL($uri);
        }

        if ($title == '') {
            $title = $siteURL;
        }

        if ($attributes != '') {
            $attributes = _parseAttributes($attributes);
        }

        return '<a href="' . $siteURL . '"' . $attributes . '>' . $title . '</a>';
    }

}
/* * ************************************************************************ */

/*
 * function _parseAttributes
 * parse given attributes
 *  parameters:
 *      @attributes : string expected
 *      @javascript : boolean expected (optional)
 */

if (!function_exists('_parseAttributes')) {

    function _parseAttributes($attributes, $javascript = FALSE) {
        if (is_string($attributes)) {
            return ($attributes != '') ? ' ' . $attributes : '';
        }

        $att = '';
        foreach ($attributes as $key => $val) {
            if ($javascript == TRUE) {
                $att .= $key . '=' . $val . ',';
            } else {
                $att .= ' ' . $key . '="' . $val . '"';
            }
        }

        if ($javascript == TRUE AND $att != '') {
            $att = substr($att, 0, -1);
        }

        return $att;
    }

}
/* * ************************************************************************ */

/*
 * function heading
 * creates heading tag
 *  parameters:
 *      @hSize : string expected (optional)
 *      @hSize : string expected (optional)
 *      @hAttributes : string expected (optional)
 */

if (!function_exists('heading')) {

    function heading($hText = '', $hSize = '1', $hAttributes = '') {
        $hAttributes = ($hAttributes != '') ? ' ' . $hAttributes : $hAttributes;
        return "<h" . $hSize . $hAttributes . ">" . $hText . "</h" . $hSize . ">";
    }

}
/* * ************************************************************************ */

/*
 * function br
 * creates br tag
 *  parameters:
 *      @times : integer expected (optional)
 */

if (!function_exists('br')) {

    function br($times=1) {
        $returnString = '';
        for ($i = 0; $i < $times; $i++) {
            $returnString .= '<br>';
        }
        return $returnString;
    }

}
/* * ************************************************************************ */

// End of the file HtmlHelper.php