package com.example.demo.aspect;

import com.example.demo.config.FilterConfig;
import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Aspect;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Aspect
@Component
public class MessageFilterAspect {

    private final FilterConfig filterConfig;

    @Autowired
    public MessageFilterAspect(FilterConfig filterConfig) {
        this.filterConfig = filterConfig;
    }

    @Around("execution(* com.example.demo.service.MessageService.processMessage(..))")
    public Object filterMessage(ProceedingJoinPoint joinPoint) throws Throwable {
        Object[] args = joinPoint.getArgs();

        if (args[0] instanceof String message) {
            String lowerMessage = message.toLowerCase();

            // Check against all banned words
            for (String bannedWord : filterConfig.getBannedWords()) {
                if (bannedWord.toLowerCase().equals(lowerMessage)) {
                    args[0] = "*****";
                    break;
                }
            }
        }

        return joinPoint.proceed(args);
    }
}