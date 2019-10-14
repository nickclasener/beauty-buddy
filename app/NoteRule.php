<?php

namespace App;

use ScoutElastic\SearchRule;

class NoteRule extends SearchRule
{
    public function buildHighlightPayload()
    {
        return [
                'order'     => 'score',
                'pre_tags'  => ['<strong>'],
                'post_tags' => ['</strong>'],
                'fields'    => [
                        [
                                'body' => [
                                        'type'                => 'unified',
                                        'require_field_match' => true,
                                ],
                        ],
                ],
        ];
    }

    public function buildQueryPayload()
    {
        return [
                'must'   => [
                        [
                                'match' => [
                                        'body' => [
                                                'query'    => $this->builder->query,
                                                //												'boost'    => 10,
                                                'operator' => 'AND',
                                        ],
                                ],
                        ],
                ],
                'should' => [
                        [
                                'match' => [
                                        'body2' => [
                                                'query'     => $this->builder->query,
                                                'fuzziness' => 2,
                                                'operator'  => 'AND',
                                        ],
                                ],
                        ],
                ],
        ];
    }
}
