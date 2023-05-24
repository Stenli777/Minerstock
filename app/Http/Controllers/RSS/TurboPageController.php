<?php

namespace App\Http\Controllers\RSS;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleXMLElement;

class TurboPageController extends Controller
{
    public function rss(Request $request)
    {
        // Создание XML-структуры канала
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss xmlns:yandex="http://news.yandex.ru" version="2.0"></rss>');
        $channel = $xml->addChild('channel');
        $channel->addChild('title', 'MineInfo.ru');
        // Добавьте остальные необходимые теги, такие как description, link, language, image и т.д.

        // Получите список турбо-страниц из вашей базы данных или другого источника данных
        $posts = Post::query()->where('is_news',1)->get();
        $news = Post::query()->where('is_news',0)->get();

        foreach ($posts as $post) {
            $item = $channel->addChild('item');
            $item->addAttribute('turbo','true');
            $title = $item->addChild('title', $post['title']);
            $link = $item->addChild('link', "https://mineinfo.ru/new/".$post['alias']);
            $turbo = $item->addChild('turbo:content', '', 'http://turbo.yandex.ru');
            $turbo->addAttribute('url', "https://mineinfo.ru/post/".$post['alias']);
            $this->xml_cdata($turbo, $post['content']);
        }
        foreach ($news as $new) {
            $item = $channel->addChild('item');
            $turbo = $item->addChild('turbo:content', '', 'http://turbo.yandex.ru');
            $turbo->addAttribute('url', "https://mineinfo.ru/new/".$new['alias']);
            $this->xml_cdata($turbo, $new['content']);
        }

        // Установка заголовков и возвращение XML-канала
        $xmlString = $xml->asXML();
        $xmlString = str_replace('&nbsp;', ' ', $xmlString); // Заменить символы неразрывного пробела на обычные пробелы
        $xmlString = str_replace('&thinsp;', '', $xmlString); // Удалить символы &thinsp;
        $xmlString = str_replace('&ndash;', '—', $xmlString); // Удалить символы &thinsp;
        $xmlString = str_replace('&mdash;', '—', $xmlString); // Удалить символы &thinsp;
        return Response::make($xmlString, '200')->header('Content-Type', 'application/xml');
    }

    private function xml_cdata(SimpleXMLElement $element, $cdata_text)
    {
        $dom = dom_import_simplexml($element);
        $dom->appendChild($dom->ownerDocument->createCDATASection($cdata_text));
    }
}

