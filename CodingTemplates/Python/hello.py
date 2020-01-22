#!python
# -*- coding: utf-8 -*-

'''
Hello World in Python with database integration.

Python version used: 3.6.8

Styling guide: PEP 8 (https://www.python.org/dev/peps/pep-0008/)
'''

from __future__ import print_function

import sys

import common
import database_functions as db
import user_class as uc

__author__ = 'Rob Garcia'
__email__ = 'rgarcia@rgprogramming.com'
__license__ = 'MIT'


def hello_users():
    '''
    Test database calls, class instantiation, and validation.
    '''
    try:
        # Task 1: Retrieve information from the database
        result = db.get_all_users()
        list_of_users = []

        for row in result:
            list_of_users.append(uc.User(
                row['UserID'], row['FirstName'], row['LastName'], row['Email'],
                row['Score'], row['CreationDate'], row['Comment']))

        print("Number of users in the database: {}".format(len(list_of_users)))
        print("The first user is {}.\n".format(list_of_users[0].first_name))

        # Remember, db.get_all_users orders users by last name, not by user ID
        for index, user in enumerate(list_of_users):
            print("Hello, {} {}! You are #{}, created on {}, "
                  "and you are a(n) {}".format(
                      user.first_name, user.last_name, index + 1,
                      user.creation_date, user.comment))

        print()

        # Task 2: Add, update, and delete a new user
        thanos = []

        if db.user_exists(['thanos@rgprogramming.com']):
            print("Thanos, you are already in the database!\n")
            result = db.get_user_by_email(['thanos@rgprogramming.com'])
            thanos = uc.User(*result)
        else:
            user_id = db.create_user(
                'Thanos', 'The Mad Titan', 'thanos@rgprogramming.com', 100,
                'Unbalanced user.')
            result = db.get_user_by_user_id(user_id)
            # Use asterisk to unpack tuple into class
            thanos = uc.User(*result)
            print("Welcome {} {}! You were created on {} "
                  "and you are a(n) {}\n".format(
                      thanos.first_name, thanos.last_name, thanos.creation_date,
                      thanos.comment))

        if thanos.comment == 'Unbalanced user.':
            print("Uh oh, Thanos, you are unbalanced! Let's fix that!\n")
            thanos.comment = 'Balanced user.'
            db.update_user(
                thanos.user_id, thanos.first_name, thanos.last_name,
                thanos.email, thanos.score, thanos.comment)
        else:
            thanos.comment = 'Unbalanced user.'
            db.update_user(
                thanos.user_id, thanos.first_name, thanos.last_name,
                thanos.email, thanos.score, thanos.comment)
            print("Thanos, you've become unbalanced!\n")

        print("Sorry, Thanos; I am Iron Man, and you've got to go!\n")

        if db.delete_user(thanos.user_id) == 1:
            print('Destiny fulfilled.')
        else:
            print('Thanos cannot be deleted; he is inevitable!')

    except Exception:
        ex = common.error_log(sys.exc_info())
        if common.DISPLAY_ERRORS:
            print(ex)
        else:
            print('Unable to connect to the database and retrieve data. '
                  'Check the error log for details.')


def main():
    '''
    Application entry point.
    '''
    print("Hello, World!\n")
    hello_users()


if __name__ == '__main__':
    main()
