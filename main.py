from flask import Flask, render_template, request, redirect, url_for, session
from flask_mysqldb import MySQL
import MySQLdb.cursors
import MySQLdb.cursors, re, hashlib

app = Flask(__name__)

app.secret_key = 'aaa222'

@app.route('/login/', methods=['GET', 'POST'])
def login():
    msg = ''

    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Create variables for easy access
        username = request.form['username']
        password = request.form['password']
        # Retrieve the hashed password
        hash = password + app.secret_key
        hash = hashlib.sha1(hash.encode())
        password = hash.hexdigest()

        # Check if account exists using MySQL
        


        # If accout exists in accounts table in out database
        if account:
            session['loggedin'] = True
            session['id'] = account['username']
            # Redirect to home page
            return 'Logged in successfully!'
        else:
            msg = 'Incorrect username/password!'