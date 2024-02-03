<?php

namespace App\Enum;

final class Permissions
{
    public const VIEW_MY_PROFILE = 'view my profile';
    public const UPDATE_MY_ACCOUNT = 'update my account';

    public const VIEW_ANY_POST = 'view any post';
    public const LIKE_ANY_POST = 'like any post';

    public const CREATE_NEW_POST = 'create new post';
    public const READ_MY_POST = 'read my post';
    public const UPDATE_MY_POST = 'update my post';
    public const DELETE_MY_POST = 'delete my post';

    public const READ_ANY_POST = 'read any post';
    public const UPDATE_ANY_POST = 'update any post';
    public const DELETE_ANY_POST = 'delete any post';

    public const CREATE_ANY_ACCOUNT = 'create any account';
    public const READ_ANY_ACCOUNT = 'read any account';
    public const UPDATE_ANY_ACCOUNT = 'update any account';
    public const DELETE_ANY_ACCOUNT = 'delete any account';

    public const CREATE_ANY_COMMENT = 'create any comment';
    public const READ_ANY_COMMENT = 'read any comment';
    public const UPDATE_ANY_COMMENT = 'update any comment';
    public const DELETE_ANY_COMMENT = 'delete any comment';
}
