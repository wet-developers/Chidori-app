package com.blogproject.Sayeh.SayehBlog;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.jdbc.DataSourceAutoConfiguration;
import org.springframework.context.annotation.Bean;
import org.springframework.orm.hibernate5.LocalSessionFactoryBean;

@SpringBootApplication
public class SayehBlogApplication {

	public static void main(String[] args) {
		SpringApplication.run(SayehBlogApplication.class, args);
	}

}
